# miniURL

## Task
“Минификатор URL” Пользователю предотавляется поле для ввода URL, по нажатию кнопки “Уменьшить” пользователю предоставляется короткая ссылка с текущим доменом сайта (вида http:///aBcD). При переходе по уменьшеной ссылке юзер будет перенаправлен на исходную страницу. Пользователь должен иметь возможность создать свою короткую ссылку. Пользователь должен иметь возможность создавать ссылки с ограниченным сроком жизни.
Как бонус: Пользователь, создающий ссылку также получает ссылку на статистику переходов. В статистике должна отображаться география переходов, данные из юзер агентов переходящих (можно использовать google charts).

### The task was completed with support of  this components: 
- PHP 5.6+ 
- ООП 
- ZF3
- Apache 2.4 
- Doctrine 2 для работы с MySQL
- https://getcomposer.org/ для автолоада классов и подключения сторонних библиотек, используемых для решения задачи (написанных вами в том числе) 
- http://getbootstrap.com/ для стилизации HTML страниц 

### And besides I used :
* [geoip2](http://maxmind.github.io/GeoIP2-php/) - Check user location
* [flash-noty-messenger](https://github.com/tasmaniski/zend-flash-noty-messenger) - modify flash-messanges
* and API google charts


### Installation

You should use ```composer install``` in the root of application folder.

### DB location:

DB has been contained in the root application folder with the name - ```zf3_gns.sql``` and you can import it.

### Scheme db of application:
![](https://github.com/kotliarmikhail/miniURL/blob/master/db.png)

### Some screens of work app.

![](https://github.com/kotliarmikhail/miniURL/blob/master/layout.png) 
 
![](https://github.com/kotliarmikhail/miniURL/blob/master/add.png) 


![](https://github.com/kotliarmikhail/miniURL/blob/master/false.png) 

 
![](https://github.com/kotliarmikhail/miniURL/blob/master/analytics.png) 


