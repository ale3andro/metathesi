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
cur.execute("SET NAMES UTF8")
# TODO Ola ta db queries na ginontai mia fora
global counter
counter=0

@app.route('/')
def hello_world():
    global counter
    counter += 1
    print counter
    cur.execute('select * from a_specialties order by code')
    eidikothtes_a = []
    for row in cur.fetchall():
        eidikothtes_a.append([row[0], row[1].decode('utf8'), row[2].decode('utf8')])

    cur.execute('select * from b_specialties order by code')
    eidikothtes_b = []
    for row in cur.fetchall():
        eidikothtes_b.append([row[0], row[1].decode('utf8'), row[2].decode('utf8')])

    cur.execute('select distinct(year) from a_bases order by year')
    years_a = []
    for row in cur.fetchall():
        years_a.append([int(row[0]), row[0].decode('utf8')])

    cur.execute('select distinct(year) from b_bases order by year')
    years_b = []
    for row in cur.fetchall():
        years_b.append([int(row[0]), row[0].decode('utf8')])

    return render_template('homepage.html', a_eidikothtes=create_select_element("eidikothtes_a", eidikothtes_a),
                                                b_eidikothtes=create_select_element("eidikothtes_b", eidikothtes_b),
                                                a_years=create_select_element("years_a", years_a),
                                                b_years=create_select_element("years_b", years_b),
                                                a_areas=create_select_element("areas_a", get_perioxes_a()),
                                                b_areas=create_select_element("areas_b", get_perioxes_b()))

@app.route('/protobathmia')
def show_protobathmia():
    return render_template('oles_oi_perioxes_metathesis.html', areas=get_perioxes_a(), ba8mida='a')

@app.route('/deuterobathmia')
def show_deuterobathmia():
    return render_template('oles_oi_perioxes_metathesis.html', areas=get_perioxes_b(), ba8mida='b')

@app.route('/anoixtos_kodikas')
def show_open_source():
    return render_template('open_source.html')

@app.route('/baseis/<ba8mida>/<eidikothta>/<etos>/<perioxh>')
def baseis(ba8mida, eidikothta, etos, perioxh):
    return render_template('text_content.html', var=[ba8mida, eidikothta, etos, perioxh])

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
def create_select_element(element_name, values):
    retval = '<select name="' + element_name + '">'
    for item in values:
        retval += '<option value="' + str(item[0]) + '">' + item[1] + '</option>'
    retval += '</select>'
    return retval

def get_provinces():
    cur.execute('select * from provinces order by description')
    provinces = []
    for row in cur.fetchall():
        provinces.append([row[0], row[1].decode('utf8')])
    return provinces

def get_perioxes_a():
    provinces = get_provinces()
    areas_a = []
    for item in provinces:
        cur.execute('select * from a_areas where dipe_id=' + str(item[0]) + ' and id<1000 order by id')
        for row in cur.fetchall():
            if (row[2]==' '):
                areas_a.append([row[0], row[4].decode('utf8')])
            else:
                areas_a.append([row[0], item[1] + " " + row[2].decode('utf8')])
    return areas_a

def get_perioxes_b():
    provinces = get_provinces()
    areas_b = []
    for item in provinces:
        cur.execute('select * from b_areas where dide_id=' + str(item[0]) + ' and id<1000 order by id')
        for row in cur.fetchall():
            if (row[2]==' '):
                areas_b.append([row[0], row[4].decode('utf8')])
            else:
                areas_b.append([row[0], item[1] + " " + row[2].decode('utf8')])
    return areas_b
