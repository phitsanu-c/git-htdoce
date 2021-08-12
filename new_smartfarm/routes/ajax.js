var express = require('express')
var app = express();
// var bodyparser = require('body-parser');
// var urlencodedparser = bodyparser.urlencoded({ extended: false })

// app.set('views', __dirname + '/views');
// app.set('view engine', 'ejs');
// app.use(express.static(__dirname + '/public'));
// app.use(express.cookieParser());

app.get('/', function(req, res) {
    res.render('ajax.ejs');
});

// app.post('/ajax', urlencodedparser, function(req, res) {
//     console.log(req);
//     console.log('req received');
//     res.redirect('/');

// });

app.listen(8888);

app.get('/', function(req, res) {

    res.render('ajax.ejs');

});

app.post('/ajax', express.bodyParser(), function(req, res) {

    console.log(req);
    console.log('req received');
    res.redirect('/');

});