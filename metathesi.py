# coding=utf-8
from flask import Flask
from flask import render_template, request, redirect
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config.from_object('config')

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

class perifereiakes(db.Model):
    __table__ = db.Model.metadata.tables['regions']

def get_eidikothtes(ba8mida):
    eidikothtes = []
    if (ba8mida=="a"):
        for row in db.session.query(a_specialties).filter(a_specialties.id>1000).order_by(a_specialties.code):
            # clean_url, κωδικός ειδικότητας, περιγραφη ειδικότητας, id πίνακα
            eidikothtes.append([row.clean_url, row.code, row.description, row.id ])
        return eidikothtes
    if (ba8mida=="b"):
        for row in db.session.query(b_specialties).filter(b_specialties.id>1000).order_by(b_specialties.code):
            # clean_url, κωδικός ειδικότητας, περιγραφη ειδικότητας, id πίνακα
            eidikothtes.append([row.clean_url, row.code, row.description, row.id ])
        return eidikothtes
    return null

def get_years(ba8mida):
    years = []
    if (ba8mida=="a"):
        for row in db.session.query(a_bases.year).filter(a_bases.year>2012).distinct().order_by(a_bases.year):
            years.append([int(row.year), row.year])
        return years
    if (ba8mida=="b"):
        for row in db.session.query(b_bases.year).filter(b_bases.year>2012).distinct().order_by(b_bases.year):
            years.append([int(row.year), row.year])
        return years
    return null

def get_provinces():
    all_provinces = []
    for row in db.session.query(provinces).order_by(provinces.description):
        all_provinces.append([row.id, row.description, row.clean_url])
    return all_provinces

def get_perifereikes():
    all_perifereiakes = []
    for row in db.session.query(perifereiakes).order_by(perifereiakes.description):
        all_perifereiakes.append([row.id, row.description, row.url])
    return all_perifereiakes

def get_areas(ba8mida):
    areas = []
    all_provinces = get_provinces()
    if (ba8mida=="a"):
        for item in all_provinces:
            for row in db.session.query(a_areas).filter(a_areas.dipe_id==item[0], a_areas.id<1000):
                if (row.full_name!='null'):
                    areas.append([row.clean_url, row.full_name, row.dipe_id, row.id])
                elif (row.description=='null'):
                    areas.append([row.clean_url, item[1], row.dipe_id, row.id])
                else:
                    areas.append([row.clean_url, item[1] + " " + row.description, row.dipe_id, row.id])
        return areas
    if (ba8mida=="b"):
        for item in all_provinces:
            for row in db.session.query(b_areas).filter(b_areas.dide_id==item[0], b_areas.id<1000):
                if (row.full_name!='null'):
                    areas.append([row.clean_url, row.full_name, row.dide_id, row.id])
                elif (row.description=='null'):
                    areas.append([row.clean_url, item[1], row.dide_id, row.id])
                else:
                    areas.append([row.clean_url, item[1] + " " + row.description, row.dide_id, row.id])
        return areas
    return null

@app.route('/')
def index():
    return render_template('homepage.html', a_eidikothtes=create_select_element("eidikothtes_a", get_eidikothtes("a")),
                                                b_eidikothtes=create_select_element("eidikothtes_b", get_eidikothtes("b")),
                                                a_years=create_select_element("years_a", get_years("a")),
                                                b_years=create_select_element("years_b", get_years("b")),
                                                a_areas=create_select_element("areas_a", get_areas("a")),
                                                b_areas=create_select_element("areas_b", get_areas("b")))

@app.route('/protobathmia')
def show_protobathmia():
    return render_template('oles_oi_perioxes_metathesis.html', areas=get_areas("a"), provinces=get_provinces(), ba8mida='a')

@app.route('/deuterobathmia')
def show_deuterobathmia():
    return render_template('oles_oi_perioxes_metathesis.html', areas=get_areas("b"), provinces=get_provinces(), ba8mida='b')

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

@app.route('/eidikothtes_protobathmias')
def show_eidikothtes_prwtobathmias():
    from config import RESULTS_PER_PAGE
    a_eidikothtes=db.session.query(a_specialties).filter(a_specialties.id>1000).order_by(a_specialties.code).paginate(1, RESULTS_PER_PAGE, False)
    return render_template('eidikothtes.html', page_title=u'Ειδικότητες Εκπαιδευτικών Πρωτοβάθμιας', page_data=a_eidikothtes)

@app.route('/eidikothtes_deuterobathmias/', defaults={'page':1})
@app.route('/eidikothtes_deuterobathmias/<int:page>')
def show_eidikothtes_deuterobathmias(page):
    from config import RESULTS_PER_PAGE
    try:
        page_num=int(page)
    except ValueError:
        return render_template("text_content.html", var="Ο αριθμός σελίδας πρέπει να είναι ακέραιος αριθμός".decode('utf8'))
    b_eidikothtes=db.session.query(b_specialties).filter(b_specialties.id>1000).order_by(b_specialties.code).paginate(int(page), RESULTS_PER_PAGE, False)
    return render_template('eidikothtes.html', page_title=u'Ειδικότητες Εκπαιδευτικών Δευτεροβάθμιας', page_data=b_eidikothtes)

@app.route('/perifereiakes')
def show_perifereiakes():
    return render_template('one-column.html', page_title=u"Περιφερειακές Διευθύνσεις Εκπαίδευσης", page_data=get_perifereikes())

@app.route('/baseis/<ba8mida>/<eidikothta>/<etos>/<perioxh>/<page>')
def baseis(ba8mida, eidikothta, etos, perioxh, page):
    from config import RESULTS_PER_PAGE
    try:
        page_num=int(page)
    except ValueError:
        return render_template("text_content.html", var="Ο αριθμός σελίδας πρέπει να είναι ακέραιος αριθμός".decode('utf8'))
    if (ba8mida!='a' and ba8mida!='b'):
        return render_template('text_content.html', var='Δεν υπάρχει αυτή η βαθμίδα'.decode('utf8'))
    if (eidikothta=='ola' and perioxh=='ola' and etos=='ola'):
        return render_template('text_content.html', var='δεν μπορεί να είναι όλα'.decode('utf8'))
    retVal = []
    kwargs = {}
    arg_specialty_id = get_specialty_id_from_clean_url(ba8mida, eidikothta)
    arg_area_id = get_area_id_from_clean_url(ba8mida, perioxh)
    if (eidikothta!='ola'):
        # TODO Check if eid_id == -1
        kwargs['specialty_id'] = arg_specialty_id
    if (perioxh!='ola'):
        # TODO Check if per_id == -1
        kwargs['area_code'] = arg_area_id
    if (etos!='ola'):
        kwargs['year'] = etos

    perioxes = {}
    eidikothtes = {}
    if ba8mida=='a':
        if (etos!='ola'):
            selectedBases = db.session.query(a_bases).filter_by(**kwargs).paginate(int(page), RESULTS_PER_PAGE, False)
        else:
            selectedBases = db.session.query(a_bases).filter_by(**kwargs).filter(a_bases.year>2012).paginate(int(page), RESULTS_PER_PAGE, False)
        for item in get_areas("a"):
            perioxes[item[3]] = item[1]
        for item in get_eidikothtes("a"):
            eidikothtes[item[3]] = item[2]

    elif ba8mida=='b':
        if (etos!='ola'):
            selectedBases = db.session.query(b_bases).filter_by(**kwargs).paginate(int(page), RESULTS_PER_PAGE, False)
        else:
            selectedBases = db.session.query(b_bases).filter_by(**kwargs).filter(b_bases.year>2012).paginate(int(page), RESULTS_PER_PAGE, False)
        for item in get_areas("b"):
            perioxes[item[3]] = item[1]
        for item in get_eidikothtes("b"):
            eidikothtes[item[3]] = item[2]

    #for row in selectedBases:
    #    retVal.append([row.area_code, row.points, row.how_many_in, row.year])
    return render_template('search_results.html', ba8mida=ba8mida,
            eidikothta=eidikothta, arg_specialty_id=arg_specialty_id, eidikothtes=eidikothtes,
            etos=etos,
            perioxh=perioxh, arg_area_id=arg_area_id, perioxes=perioxes,
            baseis=selectedBases)

@app.route('/search_results', methods=["POST"])
def search_results():
    a_years = request.form.get('years_a')
    b_years = request.form.get('years_b')
    if (a_years is not None):
        a_eidikothtes = request.form.get('eidikothtes_a')
        a_areas = request.form.get('areas_a')
        return redirect('/baseis/a/' + str(a_eidikothtes) + '/' + str(a_years) + '/' + str(a_areas)+'/1')
    elif (b_years is not None):
        b_eidikothtes = request.form.get('eidikothtes_b')
        b_areas = request.form.get('areas_b')
        return redirect('/baseis/b/' + str(b_eidikothtes) + '/' + str(b_years) + '/' + str(b_areas)+'/1')
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
    specialties = []
    specialties = get_eidikothtes("a")
    if ba8mida=='b':
        specialties = get_eidikothtes("b")
    for item in specialties:
        if clean_url==item[0]:
            return item[3]
    return -1

def get_area_id_from_clean_url(ba8mida, clean_url):
    areas = []
    areas = get_areas("a")
    if ba8mida=='b':
        areas = get_areas("b")
    for item in areas:
        if clean_url==item[0]:
            return item[3]
    return -1
