<p align="center">
  <img src="https://cdn.discordapp.com/attachments/861904940716654614/861939464572764160/kokoro.png" />
</p>

<h1 align="center">Kokoro Natsume</h1>

<p align="center">Simple Discord Bot that give an information about Princess Connect! Re:DIVE (On-Development)</p>
<p align="center">
made with ♥ by <a href="https://github.com/troke12">troke12</a>
</p>

### Usage

```bash
git clone https://github.com/troke12/kokkoro
cd kokkoro
npm install
node kokkoro.js
```

Configuration (`config.json`) :

```js
{
    "bot": {
        "token": "",
        "prefix": "k!"
    },
    "db": {
        "host":"",
        "port":"",
        "username":"",
        "password":"",
        "database":""
    }
}
```

### Website

This `/web/` are for displaying all data from pricone and manually input it to the database.

Requirements :
- php5+
- mysql-server

How to run it on terminal :

```
cd kokkoro/web
php -S localhost:8000
```

*Make sure you already install all of environments before running the web!*

### Database

Database are coming next after full development!

### Contributing

Contributors are open for developing this bot, please make pull request or make issues or dm me on discord `troke.id#0027`