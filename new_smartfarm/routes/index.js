var express = require('express');
var dbcon = require('./connect_db');
var router = express.Router();

// var ifNotLogin = (req, res, next) => {
//     if (!req.session.ifLogin) {
//         return res.render('page_login');
//     }
//     next();
// }
// var ifLogin = (req, res, next) => {
//     if (req.session.ifLogin) {
//         return res.render('index');
//     }
//     next();
// }

/* GET home page. */
router.get('/', function(req, res, next) {
    if (req.cookies.statusLogin) {
        console.log(req.cookies.statusLogin.userStatus);
        if (req.cookies.statusLogin.userStatus === '1') {
            res.redirect('/selhouse');
        } else {
            res.render('index', { page: 'index' });
        }
    } else {
        res.render('page_login');
    }
    console.log(req.cookies.user);
});

router.get('/logout', (req, res) => {
    res.clearCookie('statusLogin');
    // req.logout();
    res.render('page_login');
    // res.redirect('/');
});
module.exports = router;