const mysql = require('mysql');
const dbcon = mysql.createConnection({
    host: '103.2.115.246',
    user: 'root2',
    password: '67235520',
    database: 'new_smartfarm'
});
dbcon.connect((err) => {
    if (err) throw err;
    console.log('Connected!');
});
module.exports = dbcon;