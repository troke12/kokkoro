const config = require('../config.json')
const subcommands = {
	help: (embed) => embed
		.setTitle("FAQ")
		.setDescription("Sayangku wangy")
		.setImage("https://wallpaperaccess.com/full/4496438.jpg"),
}

const Discord = require('discord.js');
const randomcolor_1 = require("randomcolor");

module.exports = {
	name: "faq",

	run: (client, message, args) => {
		if(!args.length || !args[0]) return message.channel.send("Invalid arguments.");
		const subcmd = args.shift()
		const sub = subcommands[subcmd.toLowerCase()]
		if(!sub) return message.channel.send("Your command is wrong, please use `" + config.bot.prefix + "")

		const color = randomcolor_1.randomColor();
		const hex = parseInt(color.replace(/^#/, ''), 16);
		const embed = new Discord.MessageEmbed()
			.setColor(hex);

		sub(embed)

		return message.channel.send(embed)
	}
}