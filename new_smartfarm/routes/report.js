var express = require('express');
var dbcon = require('./connect_db');
var router = express.Router();

router.get('/', function(req, res, next) {
    // if (req.cookies.statusLogin) {
    //     console.log(req.cookies.statusLogin.userStatus);
    //     if (req.cookies.statusLogin.userStatus === '1') {
    res.render('report', { page: 'report' });
    //     } else {
    //         res.render('index', { page: 'index' });
    //     }
    // } else {
    //     res.render('page_login');
    // }
    console.log(req.cookies.user);
});

module.exports = router;