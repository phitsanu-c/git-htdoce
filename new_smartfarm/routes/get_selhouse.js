var express = require('express');
var dbcon = require('./connect_db');
var router = express.Router();

router.get('/house:siteID', function(req, res, next) {
    // console.log('siteID=' + req.params.siteID);
    res.redirect('<a class="btn btn-rounded btn-block btn-outline-info" href=""><div class="mail-contnet"> 5555</div></a>')
});

module.exports = router;