module.exports = {
	name: "ready",

	/**
     * @param {import("discord.js").Client} client
     */
	listen: (client) => {
		console.log(`Kokkoro started, with ${client.users.cache.size} users, in ${client.channels.cache.size} channels of ${client.guilds.cache.size} guilds.`);
		client.user.setActivity("Princess Connect! Re:DIVE", {type: "PLAYING", url: "https://priconne-redive.jp/"});
	}
}