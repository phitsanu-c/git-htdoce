var express = require("express");
const bodyParser = require('body-parser')
var app = express();
// var fs = require('fs');

app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: true }))



// var express = require("express");
// var app = express();
// var bodyParser = require('body-parser');
// app.use(bodyParser.json());

app.post("/ajax", (req, res) => {
    console.log(req.body.city);
    // res.send(data);
});

const port = process.env.PORT || 3001;
app.listen(port);
console.log('Server started at http://localhost:' + port);