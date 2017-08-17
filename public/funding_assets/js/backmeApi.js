var bkme = new Vue({
	el: '#bar',
	data: {
		backmeData: {
			rewards: []
		}
	},

	created: function() {
		this.fetchBackme()
	},

	computed: {

		ticketObj: function() {
			
			var ticketCount = 0
			this.backmeData.rewards.forEach( function(reward) {
				
				var $id = reward.id
				var $pledgedCount = reward.pledged_count + reward.wait_pledged_count
				
				if ( $id === 3281 ) {
					ticketCount += $pledgedCount
				}
				else if ( $id === 3282 ) {
					ticketCount += $pledgedCount * 5
				}
				else if ( $id === 3283 ) {
					ticketCount += $pledgedCount * 10
				}
				else {
					ticketCount += 0
				}

			})

			return {
				count: ticketCount,
				progressPercentage: (Math.floor(ticketCount * 1000 / 2017) / 10) + '%'
			}
		}

	},

	methods: {
		fetchBackme: function() {
			var self = this
			var apiURL = 'https://zashare.backme.tw/api/projects/650.json?token=bc22b5b00155b382320ee8f444a50d97'
			$.getJSON(apiURL, function(data) {
				self.backmeData = data
			})
		}
	}

})