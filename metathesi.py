# coding=utf-8
from flask import Flask
from flask import render_template
app = Flask(__name__)

@app.route('/')
def hello_world():
    return render_template('template.html')


@app.route('/perioxes/<name>')
def show_perioxh(name):
    return 'area: %s' % name
