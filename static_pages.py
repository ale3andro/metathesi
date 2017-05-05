from flask import Flask
from flask import render_template
app = Flask(__name__)

@app.route('/disclaimer')
def disclaimer():
    return render_template('disclaimer.html')
