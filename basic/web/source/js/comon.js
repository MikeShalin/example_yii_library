/**
 * Created by mike on 08.03.18.
 */
const mysql = require ('mysql');

module.exports = {
    connect: mysql.createConnection({
        host: '127.0.0.1',
        user: 'root',
        password: 'root',
        database: 'library'
    })
};