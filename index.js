const path = require('path');

const express = require('express');
const app = express();

app.set('port', (process.env.PORT || 8080));
app.use(express.static(path.join(__dirname, '/public')));

app.get('/', function (request, response) {
  response.redirect('index.html');
});

app.listen(app.get('port'), function () {
  console.log('Node app is running at localhost: ' + app.get('port'));
});
