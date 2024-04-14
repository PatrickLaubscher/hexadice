# hexadice

## Brief 

Hexadice is an e-commerce application developped on PHP only. This project take place in our back dev training course in Human Booster. 
As inspiration, I've used the following well-known websites : 
https://www.philibertnet.com/
https://www.espritjeu.com/
https://www.ludum.fr/
The pictures of the games, the descriptions and information are coming from these websites only. 

Logo / colors / typo have been designed by Mara Ciora. I've also received some suggestions on UI/UX.
https://maraciora.com/

The application isn't finished at this stage. I will continue to work on it.




## Back-end - Developpement


### Autoloader 

Following the course of Graphikarts on PHP POO, I've tried to use the Autoloader on it's simple shape. In that and to clear the code at maximum, I've tried to build up as many classes as I could.


### Database singleton

Database connexion is monitoring with a singleton designn patern, inspirate from several sources on the web, like Graphikarts PHP POO basic course as well.
As only one instance of the class is used, I've limited the use of getting it and implemented only when I thought it was necessary. As I'm not completely familiar with singleton, I'm not sure if I can ask the instance less. 


### Back-office

I've developped a back office in the intention to make more CRUD as I could. I've had some difficulties to implement dynamically the fields for categories, authors or illustrators as the game may have one or several of them. I wanted the admin user to be able to chose the number of field. The only solution I've found and based on my basic knowledges on JS was to make the choice of the number of fields before fill in the form. Quite not UX friendly in my opinion but it's working. 
In a parallel way, the update form of the game is quite working instead of regarding the update of features linked by the main table game on MANY to MANY connexion. My algorithm isn't working to update several features. I thought that maybe the easiest way was to get the actual values of the features in the form and after modify them, instead of let all the fields empty. 
The back-office include  



## Configuration

Use as model the following file `config/db.ini-template` in order to create `config/db.ini` with this structure :

```ini
DB_HOST="127.0.0.1"
DB_PORT=3306
DB_NAME="dbname"
DB_CHARSET="utf8mb4"
DB_USER="dbuser"
DB_PASSWORD="password"
```
