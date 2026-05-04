/**
 * Swiper Slider
 */
try {
	let menu = [];
	let interleaveOffset = 0.5;
	let swiperOptions = {
		loop: true,
		speed: 1000,
		parallax: true,
		autoplay: {
			delay: 6500,
			disableOnInteraction: false,
		},
		watchSlidesProgress: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + 0 + (index + 1) + '</span>';
			},
		},

		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

		on: {
			progress: function () {
				let swiper = this;
				for (let i = 0; i < swiper.slides.length; i++) {
					let slideProgress = swiper.slides[i].progress;
					let innerOffset = swiper.width * interleaveOffset;
					let innerTranslate = slideProgress * innerOffset;
					swiper.slides[i].querySelector(".slide-inner").style.transform = "translate3d(" + innerTranslate + "px, 0, 0)";
				}
			},

			touchStart: function () {
				let swiper = this;
				for (let i = 0; i < swiper.slides.length; i++) {
					swiper.slides[i].style.transition = "";
				}
			},

			setTransition: function (speed) {
				let swiper = this;
				for (let i = 0; i < swiper.slides.length; i++) {
					swiper.slides[i].style.transition = speed + "ms";
					swiper.slides[i].querySelector(".slide-inner").style.transition = speed + "ms";
				}
			}
		}
	};

	// DATA BACKGROUND IMAGE
	let swiper = new Swiper(".swiper-container", swiperOptions);

	let data = document.querySelectorAll(".slide-bg-image");
	data.forEach((e) => {
		e.style.backgroundImage = `url(${e.getAttribute('data-background')})`;
	});
} catch (err) {
}

/**
 * Countdown
 */
try {
	if (document.getElementById("days")) {
		// The data/time we want to countdown to
		let eventCountDown = new Date("December 25, 2022 16:37:52").getTime();

		// Run myfunc every second
		let myfunc = setInterval(function () {

			let now = new Date().getTime();
			let timeleft = eventCountDown - now;

			// Calculating the days, hours, minutes and seconds left
			let days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
			let hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			let minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
			let seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

			// Result is output to the specific element
			document.getElementById("days").innerHTML = days + "<p class='count-head'>Days</p> ";
			document.getElementById("hours").innerHTML = hours + "<p class='count-head'>Hours</p> ";
			document.getElementById("mins").innerHTML = minutes + "<p class='count-head'>Mins</p> ";
			document.getElementById("secs").innerHTML = seconds + "<p class='count-head'>Secs</p> ";

			// Display the message when countdown is over
			if (timeleft < 0) {
				clearInterval(myfunc);
				document.getElementById("days").innerHTML = "";
				document.getElementById("hours").innerHTML = "";
				document.getElementById("mins").innerHTML = "";
				document.getElementById("secs").innerHTML = "";
				document.getElementById("end").innerHTML = "00:00:00:00";
			}
		}, 1000);
	}
} catch (err) {
}

/**
 * Data Counter
 */
try {
	const counter = document.querySelectorAll('.counter-value');
	const speed = 2500; // The lower the slower

	counter.forEach(counter_value => {
		const updateCount = () => {
			const target = +counter_value.getAttribute('data-target');
			const count = +counter_value.innerText;

			// Lower inc to slow and higher to slow
			let inc = target / speed;

			if (inc < 1) {
				inc = 1;
			}

			// Check if target is reached
			if (count < target) {
				// Add inc to count and output in counter_value
				counter_value.innerText = (count + inc).toFixed(0);
				// Call function every ms
				setTimeout(updateCount, 1);
			} else {
				counter_value.innerText = target;
			}
		};

		updateCount();
	});
} catch (err) {
}

/**
 * Tobii Lightbox
 */
try {
	const tobii = new Tobii();
} catch (err) {
}

/**
 * Typed text animation
 */
try {
	let TxtType = function (el, toRotate, period) {
		this.toRotate = toRotate;
		this.el = el;
		this.loopNum = 0;
		this.period = parseInt(period, 10) || 2000;
		this.txt = '';
		this.tick();
		this.isDeleting = false;
	};

	TxtType.prototype.tick = function () {
		let i = this.loopNum % this.toRotate.length;
		let fullTxt = this.toRotate[i];
		if (this.isDeleting) {
			this.txt = fullTxt.substring(0, this.txt.length - 1);
		} else {
			this.txt = fullTxt.substring(0, this.txt.length + 1);
		}
		this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';
		let that = this;
		let delta = 200 - Math.random() * 100;
		if (this.isDeleting) { delta /= 2; }
		if (!this.isDeleting && this.txt === fullTxt) {
			delta = this.period;
			this.isDeleting = true;
		} else if (this.isDeleting && this.txt === '') {
			this.isDeleting = false;
			this.loopNum++;
			delta = 500;
		}
		setTimeout(function () {
			that.tick();
		}, delta);
	};

	function typewrite() {
		if (toRotate === 'undefined') {
			changeText();
		} else {
			let elements = document.getElementsByClassName('typewrite');
		}

		for (let i = 0; i < elements.length; i++) {
			let toRotate = elements[i].getAttribute('data-type');
			let period = elements[i].getAttribute('data-period');
			if (toRotate) {
				new TxtType(elements[i], JSON.parse(toRotate), period);
			}
		}
		// INJECT CSS
		let css = document.createElement("style");
		css.type = "text/css";
		css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid transparent}";
		document.body.appendChild(css);
	};

	window.onload(typewrite());
} catch (err) {
}