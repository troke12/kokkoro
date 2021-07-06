const Discord = require('discord.js');
const { pool } = require("../handlers/database");
const randomcolor_1 = require("randomcolor");

module.exports = {
	name: "info",

	run: async (client, message, args) => {
		if(!args.length || !args[0]) return message.channel.send("Please input your character `Ingame name`!");
		const msg = args.join(" ")
		const msgLow = msg.toLowerCase()
		pool.query("SELECT * FROM characters WHERE ingame_name_small = ?", [msgLow], (err, rows) => {
			if (err) return console.error(err);

			if (rows == 0) {
				message.channel.send(`Sorry your character not found!`);
			}
			else {
				const color = randomcolor_1.randomColor();
				const hex = parseInt(color.replace(/^#/, ''), 16);
				const embed = new Discord.MessageEmbed()
					.setTitle("[" + rows[0].ingame_jp_name + "] " + rows[0].ingame_name + "")
					.setColor(hex)
					.setDescription(`**Full Name**: ${rows[0].full_name}\n**Guild**: ${rows[0].guild}\n**Age**: ${rows[0].age}\n**Birthday**: ${rows[0].birthday}\n**Blood Type**: ${rows[0].blood_type}\n**Hobbies**: ${rows[0].hobbies}\n**Affiliation**: ${rows[0].affiliation}\n**Voice Actor**: ${rows[0].va}`)
					.setThumbnail("https://expugn.github.io/priconne-quest-helper/images/unit_icon/" + rows[0].ingame_name + ".png")

				message.channel.send(embed);
			}
		})
	}
}