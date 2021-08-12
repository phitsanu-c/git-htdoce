var express = require("express");
const bodyParser = require('body-parser')
var getdashRouter = require('./routes/get_dash');
var cors = require('cors')
var app = express()

app.use(cors())

app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: true }))
app.use('/get_dash', getdashRouter);

app.post("/ajax", (req, res) => {
    console.log(req.body.city);
    res.json(req.body.city);
});

const port = process.env.PORT || 3001;
app.listen(port);
console.log('Server started at http://localhost:' + port);