# coding=utf-8
from flask import Flask
from flask import render_template, request, redirect
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:root@localhost/metathes_moria'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SECRET_KEY'] = "asu9japfj09ruj230jx0q3QR#@#R Kk3"

db = SQLAlchemy(app)
db.Model.metadata.reflect(db.engine)

class a_areas(db.Model):
    __table__ = db.Model.metadata.tables['a_areas']
class a_bases(db.Model):
    __table__ = db.Model.metadata.tables['a_bases']
class a_specialties(db.Model):
    __table__ = db.Model.metadata.tables['a_specialties']

class b_areas(db.Model):
    __table__ = db.Model.metadata.tables['b_areas']
class b_bases(db.Model):
    __table__ = db.Model.metadata.tables['b_bases']
class b_specialties(db.Model):
    __table__ = db.Model.metadata.tables['b_specialties']

class provinces(db.Model):
    __table__ = db.Model.metadata.tables['provinces']

def read_globals_from_db():
    global eidikothtes_a, eidikothtes_b, years_a, years_b, all_provinces, areas_a, areas_b

    eidikothtes_a = []
    for row in db.session.query(a_specialties).order_by(a_specialties.code):
        # clean_url, κωδικός ειδικότητας, περιγραφη ειδικότητας, id πίνακα
        eidikothtes_a.append([row.clean_url, row.code, row.description, row.id ])

    eidikothtes_b = []
    for row in db.session.query(b_specialties).order_by(b_specialties.code):
        # clean_url, κωδικός ειδικότητας, περιγραφη ειδικότητας, id πίνακα
        eidikothtes_b.append([row.clean_url, row.code, row.description, row.id ])

    years_a = []
    for row in db.session.query(a_bases.year).distinct().order_by(a_bases.year):
        years_a.append([int(row.year), row.year])

    years_b = []
    for row in db.session.query(b_bases.year).distinct().order_by(b_bases.year):
        years_b.append([int(row.year), row.year])

    all_provinces = []
    for row in db.session.query(provinces).order_by(provinces.description):
        all_provinces.append([row.id, row.description, row.clean_url])

    areas_a = []
    for item in all_provinces:
        for row in db.session.query(a_areas).filter(a_areas.dipe_id==item[0], a_areas.id<1000):
            if (row.full_name!='null'):
                areas_a.append([row.clean_url, row.full_name, row.dipe_id, row.id])
            elif (row.description=='null'):
                areas_a.append([row.clean_url, item[1], row.dipe_id, row.id])
            else:
                areas_a.append([row.clean_url, item[1] + " " + row.description, row.dipe_id, row.id])

    areas_b = []
    for item in all_provinces:
        for row in db.session.query(b_areas).filter(b_areas.dide_id==item[0], b_areas.id<1000):
            if (row.full_name!='null'):
                areas_b.append([row.clean_url, row.full_name, row.dide_id, row.id])
            elif (row.description=='null'):
                areas_b.append([row.clean_url, item[1], row.dide_id, row.id])
            else:
                areas_b.append([row.clean_url, item[1] + " " + row.description, row.dide_id, row.id])

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
    return render_template('oles_oi_perioxes_metathesis.html', areas=areas_a, provinces=all_provinces, ba8mida='a')

@app.route('/deuterobathmia')
def show_deuterobathmia():
    return render_template('oles_oi_perioxes_metathesis.html', areas=areas_b, provinces=all_provinces, ba8mida='b')

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
    kwargs = {}
    if (eidikothta!='ola'):
        # TODO Check if eid_id == -1
        kwargs['specialty_id'] = get_specialty_id_from_clean_url(ba8mida, eidikothta)
    if (perioxh!='ola'):
        # TODO Check if per_id == -1
        kwargs['area_code'] = get_area_id_from_clean_url(ba8mida, perioxh)
    if (etos!='ola'):
        kwargs['year'] = etos

    if ba8mida=='a':
        selectedBases = db.session.query(a_bases).filter_by(**kwargs)
    elif ba8mida=='b':
        selectedBases = db.session.query(b_bases).filter_by(**kwargs)

    for row in selectedBases:
        retVal.append([row.area_code, row.points, row.how_many_in, row.year])
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
    retval = '<select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="' + element_name + '">'
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
