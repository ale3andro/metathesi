# Project pip3 dependencies

pip3 install flask pymysql flask_sqlalchemy cryptography

# Ποιά έκδοση Flask έχω;

python3 -m flask --version

# Δημιουργία virtual env

python3 -m venv alxenv

# Ενεργοποίηση venv

source alxenv/bin/activate

# Λίστα dependencies venv

pip3 freeze > requirements.txt

# Εγκατάσταση όλων των dependencies μέσα στο venv

pip3 install -r requirements.txt

# Έξοδος από venv

deactivate

