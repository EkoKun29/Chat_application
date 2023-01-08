const mysql = require("mysql");
const db = mysql.createConnection({
    host:"localhost",
    database : "chatapp",
    user: "root",
    password : "",
})
db.connect((err)=>{
    if(err) throw err
    console.log("database connected....")
})