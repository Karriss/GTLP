from flask import Flask, render_template
import mysql.connector

app = Flask(__name__)

# Конфигурация базы данных
db_config = {
    'host': '127.0.0.1',
    'user': 'root',
    'password': 'Kar_!kar0609',
    'database': 'horoshev36_prj'
}

# Маршрут для главной страницы с картой
@app.route('/')
def index():
    return render_template('index.html')

# Маршрут для страницы страны
@app.route('/view/<int:country_id>')
def view_country(country_id):
    # Подключение к базе данных
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor(dictionary=True)
    
    # Запрос данных о стране
    query = "SELECT * FROM countries WHERE id = %s"
    cursor.execute(query, (country_id,))
    country = cursor.fetchone()
    
    cursor.close()
    conn.close()
    
    if country:
        return render_template('view.html', country=country)
    else:
        return "Страна не найдена", 404

if __name__ == '__main__':
    app.run(debug=True)