# coding=utf-8
import MySQLdb

from flask import Flask
from flask import render_template, request, redirect
app = Flask(__name__)

db = MySQLdb.connect(host="localhost",    # your host, usually localhost
                     user="root",         # your username
                     passwd="root",  # your password
                     db="metathes_moria")        # name of the data base
cur = db.cursor()
cur.execute("set names utf8")



def read_globals_from_db():
    global eidikothtes_a, eidikothtes_b, years_a, years_b, provinces, areas_a, areas_b
    cur.execute('select * from a_specialties order by code')
    eidikothtes_a = []
    for row in cur.fetchall():
        # clean_url, κωδικός ειδικότητας, περιγραφη ειδικότητας, id πίνακα
        eidikothtes_a.append([row[3].decode('utf8'), row[1].decode('utf8'), row[2].decode('utf8'), row[0] ])

    cur.execute('select * from b_specialties order by code')
    eidikothtes_b = []
    for row in cur.fetchall():
        # clean_url, κωδικός ειδικότητας, περιγραφη ειδικότητας, id πίνακα
        eidikothtes_b.append([row[4].decode('utf8'), row[1].decode('utf8'), row[2].decode('utf8'), row[0]])

    cur.execute('select distinct(year) from a_bases order by year')
    years_a = []
    for row in cur.fetchall():
        years_a.append([int(row[0]), row[0].decode('utf8')])

    cur.execute('select distinct(year) from b_bases order by year')
    years_b = []
    for row in cur.fetchall():
        years_b.append([int(row[0]), row[0].decode('utf8')])

    cur.execute('select * from provinces order by description')
    provinces = []
    for row in cur.fetchall():
        provinces.append([row[0], row[1].decode('utf8'), row[10].decode('utf8')])

    areas_a = []
    for item in provinces:
        cur.execute('select * from a_areas where dipe_id=' + str(item[0]) + ' and id<1000 order by id')
        for row in cur.fetchall():
            if (row[4]!='null'):
                areas_a.append([row[5], row[4].decode('utf8'), row[1], row[0]])
            elif (row[2]=='null'):
                areas_a.append([row[5], item[1], row[1], row[0]])
            else:
                areas_a.append([row[5], item[1] + " " + row[2].decode('utf8'), row[1], row[0]])

    areas_b = []
    for item in provinces:
        cur.execute('select * from b_areas where dide_id=' + str(item[0]) + ' and id<1000 order by id')
        for row in cur.fetchall():
            if (row[4]!='null'):
                areas_b.append([row[5], row[4].decode('utf8'), row[1], row[0]])
            elif (row[2]=='null'):
                areas_b.append([row[5], item[1], row[1], row[0]])
            else:
                areas_b.append([row[5], item[1] + " " + row[2].decode('utf8'), row[1], row[0]])


global eidikothtes_a, eidikothtes_b, years_a, years_b
read_globals_from_db()

@app.route('/')
def index():
    return render_template('homepage.html', a_eidikothtes=create_select_element("eidikothtes_a", eidikothtes_a),
                                                b_eidikothtes=create_select_element("eidikothtes_b", eidikothtes_b),
                                                a_years=create_select_element("years_a", years_a),
                                                b_years=create_select_element("years_b", years_b),
                                                a_areas=create_select_element("areas_a", areas_a),
                                                b_areas=create_select_element("areas_b", areas_b))

@app.route('/protobathmia')
def show_protobathmia():
    return render_template('oles_oi_perioxes_metathesis.html', areas=areas_a, provinces=provinces, ba8mida='a')

@app.route('/deuterobathmia')
def show_deuterobathmia():
    return render_template('oles_oi_perioxes_metathesis.html', areas=areas_b, provinces=provinces, ba8mida='b')

@app.route('/anoixtos_kodikas')
def show_open_source():
    return render_template('open_source.html')

@app.route('/diafora')
def show_diafora():
    return render_template('diafora.html')

@app.route('/adeies')
def show_adeies():
    return render_template('adeies.html')

@app.route('/disclaimer')
def show_disclaimer():
    return render_template('disclaimer.html')

@app.route('/sxetika')
def show_sxetika():
    return render_template('sxetika-metathesigr.html')

@app.route('/baseis/<ba8mida>/<eidikothta>/<etos>/<perioxh>')
def baseis(ba8mida, eidikothta, etos, perioxh):
    if (ba8mida!='a' and ba8mida!='b'):
        return render_template('text_content.html', var='Δεν υπάρχει αυτή η βαθμίδα'.decode('utf8'))
    if (eidikothta=='ola' and perioxh=='ola' and etos=='ola'):
        return render_template('text_content.html', var='δεν μπορεί να είναι όλα'.decode('utf8'))
    retVal = []
    if ba8mida=='a':
        tquery = 'select * from a_bases where'
        cnt = 0
        if (eidikothta!='ola'):
            cnt+=1
            eid_id = get_specialty_id_from_clean_url(ba8mida, eidikothta)
            # TODO Check if eid_id == -1
            eid_query = ' `specialty_id`=\'%s\'' % str(eid_id)
        if (perioxh!='ola'):
            cnt+=1
            per_id = get_area_id_from_clean_url(ba8mida, perioxh)
            # TODO Check if per_id == -1
            per_query = ' `area_code`=\'%s\'' % str(per_id)
        if (etos!='ola'):
            cnt+=1
            etos_query = ' `year`=\'%s\'' % str(etos)
        if (cnt==0):
            tquery += ' 1'
        else:
            if (eidikothta!='ola'):
                tquery += eid_query
            if (perioxh!='ola'):
                tquery += (' and' + per_query)
            if (etos!='ola'):
                tquery += (' and' + etos_query)
        print tquery



        cur.execute(tquery)
        for row in cur.fetchall():
            retVal.append(row)
    elif ba8mida=='b':
        cur.executer('select * from b_bases')
    else:
        return render_template('error.html')
    return render_template('text_content.html', var=retVal)

@app.route('/search_results', methods=["POST"])
def search_results():
    a_years = request.form.get('years_a')
    b_years = request.form.get('years_b')
    if (a_years is not None):
        a_eidikothtes = request.form.get('eidikothtes_a')
        a_areas = request.form.get('areas_a')
        return redirect('/baseis/a/' + str(a_eidikothtes) + '/' + str(a_years) + '/' + str(a_areas))
    elif (b_years is not None):
        b_eidikothtes = request.form.get('eidikothtes_b')
        b_areas = request.form.get('areas_b')
        return redirect('/baseis/b/' + str(b_eidikothtes) + '/' + str(b_years) + '/' + str(b_areas))
    return render_template('open_source.html')

@app.route('/perioxes/<name>')
def show_perioxh(name):
    return 'area: %s' % name


## HELPERS
def create_select_element(element_name, values, add_all_item=True):
    add_all_name = 'Όλα'
    retval = '<select name="' + element_name + '">'
    if (add_all_item):
        retval += '<option value="ola">%s</option>' % add_all_name.decode('utf8')

    for item in values:
        retval += '<option value="' + str(item[0]) + '">' + item[1] + '</option>'
    retval += '</select>'
    return retval

def get_specialty_id_from_clean_url(ba8mida, clean_url):
    global eidikothtes_a, eidikothtes_b
    specialties = []
    specialties = eidikothtes_a
    if ba8mida=='b':
        specialties = eidikothtes_b
    for item in specialties:
        if clean_url==item[0]:
            return item[3]
    return -1

def get_area_id_from_clean_url(ba8mida, clean_url):
    global areas_a, areas_b
    areas = []
    areas = areas_a
    if ba8mida=='b':
        areas = areas_b
    for item in areas:
        if clean_url==item[0]:
            return item[3]
    return -1
