# coding=utf-8
from flask import Flask
from flask import render_template
app = Flask(__name__)
import static_pages

@app.route('/')
def hello_world():
    return render_template('homepage.html')


@app.route('/perioxes/<name>')
def show_perioxh(name):
    return 'area: %s' % name
