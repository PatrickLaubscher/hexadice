# hexadice

## Brief 

Hexadice is an e-commerce application developped on PHP only. This project takes place in our back dev training course in Human Booster. 
As inspiration, I've used the following well-known websites : 
https://www.philibertnet.com/
https://www.espritjeu.com/
https://www.ludum.fr/
The pictures of the games, the descriptions and information are coming from these websites only. 

Logo / colors / typo have been designed by Mara Ciora. I've also received some suggestions on UI/UX.
https://maraciora.com/

The application isn't finished at this stage. I will continue to work on it.




## Website UI


### Back-office

I've developped a back office in the intention to make more CRUD as I could. I've had some difficulties to implement dynamically the fields for categories, authors or illustrators as the game may have one or several of them. I wanted the admin user to be able to chose the number of field. The only solution I've found and based on my basic knowledges on JS was to make the choice of the number of fields before fill in the form. Quite not UX friendly in my opinion but it's working. 
In a parallel way, the update form of the game is quite working instead of regarding the update of features linked by the main table game on MANY to MANY connexion. My algorithm isn't working to update several features. I thought that maybe the easiest way was to get the actual values of the features in the form and after modify them, instead of let all the fields empty. 
The back-office include also a customer messaging interface and I also intended to add the logistic section containing the actual stock by item and the possibility to enter stock purchase order. 

### Home page

The home page includes a pagination of product cards and a research field. It took me time to work on it in the most optimize way I could do. It's include the research by name, categories, players number and minimum age as they most used of looking to games.
The home page has link to register customer page, newsletter form, game pages and login. The nav bar has icon which change depending on the presence of a costumer or an employee session. 
We can also add product to the shopping cart from the home page and the game page as well.

### Game page

The page contains all the information for every game, a gallery of images with a carrousel and a modal pop up when clicking on the main image. 
The use can also add the product to the shopping cart.

### Shopping cart

The shopping cart is working on superglobal SESSION. User can add product, manage quantities or reset the cart. The validation of the cart reset if and redirect the user to home page.

### Login pages

2 different login pages for customer and employee with password and email checking. I intented to implement a count of attempt to enhance security. 

### Customer page

It includes all the information of the costumer. I intented to add the option to upload a profile picture and to have the order history. 

### Contact page

The contact page includes the contact form in which you can chose the subject of the message, subject are based on a serie of number.



## Back-end developpement


### Classes

I've tried to build up as many classes as I could. I include an interface : ProductContent as I consider that e-commerce board games website may all sell other products than games. I've also include an abstract class : User.


### Autoloader 

Following the course of Graphikarts on PHP POO, I've tried to use the Autoloader on it's simple shape. In that and to clear the code at maximum, 


### Database singleton

Database connexion is monitoring with a singleton designn patern, inspirate from several sources on the web, like Graphikarts PHP POO basic course as well.
As only one instance of the class is used, I've limited the use of getting it and implemented only when I thought it was necessary. As I'm not completely familiar with singleton, I'm not sure if I can ask the instance less. 

### Error/validation management

I use 2 classes for both error and validation register. The reference number is passed through $_SESSION superglobal. 


### SQL Requets 

All of them are contained in classes. GameContent is the most important. 


### Upload files

In backoffice, amdin can upload files for game. The update of this file doesn't include the delete of the previous one. 


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
