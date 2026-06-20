const express = require("express")
const bodyparser = require("body-parser")
const fs = require("fs")
const path = require("path")
const app = express()
const port = 8002
const mongoose = require('mongoose');

main().catch(err => console.log(err));

async function main() {
  await mongoose.connect('mongodb://127.0.0.1:27017/Altaf');

  // use `await mongoose.connect('mongodb://user:password@127.0.0.1:27017/test');` if your database has auth enabled
}
//Define Mongo DB Schema

const contactSchema = new mongoose.Schema({
    fname: String,
    lname: String,
    email: String,
    phone: String,
    address: String,
    message: String,


  });
  const Contact = mongoose.model('Contact', contactSchema);
//EXPRESS SPECIFIC STUFF
app.use("/static",express.static("static")); // For serving the static files
app.use(express.urlencoded()); // form ka data express tk lany mai help krta hai 

//PUG SPECIFIC STUFF
app.set('view engine', 'pug'); // set the template engine as Pug
app.set("views", path.join(__dirname,"views")); // Set the view Directory

app.get("/",(req,res)=>
{
    res.status(200).render("index.pug");
})

app.get('/Contact',(req,res)=>
    {
        // add parameters in pug file
        const con = "This is the best content over the internet.";
        const para={"title":"Pug Tutorial", "content":con};
        res.status(200).render('Contact.pug',para)
    })
    app.post("/Contact", (req, res) => {
        var mydata = new Contact(req.body);
        mydata.save().then(() => { // Note the parentheses here
            res.send("The data has been saved to the database");
        }).catch((err) => { // Log the error for debugging
            console.error(err);
            res.status(404).send("Item was not saved in the database");
        });
    });
    
    app.post("/",(req,res)=>
        {
            // console.log(req.body);
            fname = req.body.fname;
            lname = req.body.lname;
            email = req.body.email;
            phone=req.body.phone;
            address = req.body.address;
            message = req.body.message;
        }) 
app.get('/Courses',(req,res)=>
    {
        // add parameters in pug file
        const con = "This is the best content over the internet.";
        const para={"title":"Pug Tutorial", "content":con};
        res.status(200).render('Courses.pug',para)
    })
app.get('/test1',(req,res)=>
    {
        // add parameters in pug file
        const con = "This is the best content over the internet.";
        const para={"title":"Pug Tutorial", "content":con};
        res.status(200).render('test1.pug',para)
    })
app.get('/About-us',(req,res)=>
    {
        // add parameters in pug file
        const con = "This is the best content over the internet.";
        const para={"title":"Pug Tutorial", "content":con};
        res.status(200).render('About-us.pug',para)
    })
app.get('/Services',(req,res)=>
    {
        // add parameters in pug file
        const con = "This is the best content over the internet.";
        const para={"title":"Pug Tutorial", "content":con};
        res.status(200).render('Services.pug',para)
    })
app.get('/Login',(req,res)=>
    {
        // add parameters in pug file
        const con = "This is the best content over the internet.";
        const para={"title":"Pug Tutorial", "content":con};
        res.status(200).render('Login.pug',para)
    })
app.listen(port,()=>
    {
        console.log(`The Application started successfully on port ${port}`);
    })