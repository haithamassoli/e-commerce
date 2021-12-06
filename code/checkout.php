<?php include "./includes/header.php"; ?>
<style>
  html {
    box-sizing: border-box;
  }

  *,
  *:before,
  *:after {
    box-sizing: inherit;
  }

  body,
  html {
    height: 100%;
  }

  body {
    display: flex;
    background: #DAECF7;
    flex-direction: column;
  }

  h1 {
    font-size: 1em;
    font-family: "Montserrat";
    text-transform: uppercase;
    margin-bottom: 20px;
    text-align: center;
    color: #b6d0e0;
    position: relative;
    margin-top: -15px;
    line-height: 15px;
  }

  .center {
    margin: auto;
  }

  .wrapper {
    width: 700px;
    flex-shrink: 0;
    background: white;
    overflow: hidden;
    height: 364px;
    border-radius: 8px;
    box-shadow: 0 1.5px 4px rgba(0, 0, 0, 0.24), 0 1.5px 6px rgba(0, 0, 0, 0.12);
  }

  .card-wrap {
    width: 260px;
    float: right;
    background: #665aa7;
    padding: 50px;
    transform: scale(1.5) rotate(20deg);
  }

  .card {
    transform: scale(0.75) rotate(-20deg);
  }

  svg {
    width: 150%;
    position: relative;
    right: 130px;
    top: 10px;
    overflow: visible;
  }

  svg:not(:root) {
    overflow: visible;
  }

  #sunglasses {
    transition: transform 0.15s;
  }

  .checkout:hover~.card-wrap #sunglasses {
    transform: translateY(-40px);
  }

  #right_eye_wink {
    display: none;
  }

  .checkout:active~.card-wrap #right_eye {
    display: none;
  }

  .checkout:active~.card-wrap #right_eye_wink {
    display: block;
  }

  #mouth {
    transition: transform 0.15s;
  }

  .checkout:hover~.card-wrap #mouth {
    transform: translateY(-10px);
  }

  #front_hand,
  #back_hand {
    transition: transform 0.03s;
  }

  .checkout:active~.card-wrap #front_hand,
  .checkout:active~.card-wrap #back_hand {
    transform: translateX(10px);
  }

  .checkout {
    outline: none;
    background: #665aa7;
    border: 0;
    color: white;
    position: relative;
    top: 50%;
    left: 15%;
    transform: translateY(-50%);
    padding: 12px 16px;
    font-family: "Montserrat";
    text-transform: uppercase;
    font-size: 1.1em;
    letter-spacing: 0.1em;
    border-radius: 4px;
    transition: all 0.1s ease-out;
    box-shadow: 0 1.5px 4px rgba(0, 0, 0, 0.24), 0 1.5px 6px rgba(0, 0, 0, 0.12);
  }

  .checkout:hover:not(:active) {
    background: #857bb9;
  }

  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
  }

  p {
    margin: 0
  }

  .container {
    max-width: 100vw;
    margin: 30px auto;
    background-color: #e8eaf6;
    padding: 35px
  }

  .box-right {
    padding: 30px 25px;
    background-color: white;
    border-radius: 15px
  }

  .box-left {
    padding: 20px 20px;
    background-color: white;
    border-radius: 15px
  }

  .textmuted {
    color: #7a7a7a
  }

  .bg-green {
    background-color: #d4f8f2;
    color: #06e67a;
    padding: 3px 0;
    display: inline;
    border-radius: 25px;
    font-size: 11px
  }

  .p-blue {
    font-size: 14px;
    color: #1976d2
  }

  .fas.fa-circle {
    font-size: 12px
  }

  .p-org {
    font-size: 14px;
    color: #fbc02d
  }

  .h7 {
    font-size: 15px
  }

  .h8 {
    font-size: 12px
  }

  .h9 {
    font-size: 10px
  }

  .bg-blue {
    background-color: #dfe9fc9c;
    border-radius: 5px
  }

  .form-control {
    box-shadow: none !important
  }

  .card input::placeholder {
    font-size: 14px
  }

  ::placeholder {
    font-size: 14px
  }

  input.card {
    position: relative
  }

  .far.fa-credit-card {
    position: absolute;
    top: 10px;
    padding: 0 15px
  }

  .fas,
  .far {
    cursor: pointer
  }

  .cursor {
    cursor: pointer
  }

  .btn.btn-primary {
    box-shadow: none;
    height: 40px;
    padding: 11px
  }

  .bg.btn.btn-primary {
    background-color: transparent;
    border: none;
    color: #1976d2
  }

  .bg.btn.btn-primary:hover {
    color: #539ee9
  }

  @media(max-width:320px) {
    .h8 {
      font-size: 11px
    }

    .h7 {
      font-size: 13px
    }

    ::placeholder {
      font-size: 10px
    }
  }
</style>
<!-- <div class="center">
  <h1>Daily UI 002: Credit Card Checkout</h1>
  <div class="wrapper">
    <button class="checkout">Checkout</button>
    <div class="card-wrap">
      <div class="card">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 216.3 234.1" enable-background="new 0 0 216.3 234.1" xml:space="preserve">
          <g id="shadow">
            <g>
              <path fill="#5A488F" d="M178.1,211.7c14.8-2.1,23.9-5.1,23.9-8.3c0-6.6-37.8-11.9-84.4-11.9c-46.6,0-84.4,5.3-84.4,11.9
			c0,5.1,23,9.5,55.3,11.2c-10.5,2.1-16.7,4.7-16.7,7.6c0,6.6,32.4,11.9,72.3,11.9c39.9,0,72.3-5.3,72.3-11.9
			C216.3,217.7,200.8,213.7,178.1,211.7z" />
            </g>
          </g>
          <g id="back_hand">
            <g>
              <path fill="#FFFFFF" d="M43.4,127.7c-2.6-4.5-3.7-9-1.9-17.2c0.4-1.6-1-3.1-2.6-2.8c-6.9,1.2-6.2,14.1-6.2,14.1H4.8
			c-2,0-3.6,1.6-3.6,3.6v0.1c0,2,1.6,3.6,3.6,3.6h10.2v20.5c0,0.5,0.4,1,1,1H18h4.5h8.8c7.5,0,14-5.6,14.7-13.1
			C46.4,133.8,45.3,130.4,43.4,127.7z" />
              <g>
                <path fill="#DAEDF7" d="M32.7,125.9h-3.4c-2.3,0-4-1.9-3.8-4.2v0h7.2L32.7,125.9z" />
              </g>
              <g>
                <path fill="#665AA7" d="M18,130.2H4.8c-2.6,0-4.8-2.1-4.8-4.8c0-2.7,2.1-4.8,4.8-4.8h27.9c0.6,0,1.1,0.5,1.1,1.1
				s-0.5,1.1-1.1,1.1H4.8c-1.4,0-2.5,1.1-2.5,2.5c0,1.4,1.1,2.6,2.5,2.6H18c0.6,0,1.1,0.5,1.1,1.1S18.6,130.2,18,130.2z" />
              </g>
              <g>
                <path fill="#DAEDF7" d="M29.3,130.9c8.3-0.6,11.2,16.6,2,19.1c-3.3,0.6-2.8-0.8-2.8-0.8l0.6-2.6c0,0-2.7-2.4,0-7.4
				C27.9,136.2,29.3,133.6,29.3,130.9z" />
              </g>
              <g>
                <path fill="#665AA7" d="M31.7,151.6H18c-0.6,0-1.1-0.5-1.1-1.1s0.5-1.1,1.1-1.1h13.7c7.3,0,13.3-5.9,13.3-13.3
				c0-2.8-0.9-5.5-2.5-7.7c0,0,0-0.1-0.1-0.1c-2.6-4.4-4-9.2-2-18.1c0.1-0.4,0-0.8-0.3-1.1c-0.3-0.3-0.7-0.4-1-0.4
				c-3.6,0.6-5.5,7-5.3,17.1c0,0.6-0.5,1.1-1.1,1.2c-0.6,0-1.1-0.5-1.2-1.1c-0.3-11.7,2.3-18.6,7.2-19.4c1.1-0.2,2.2,0.2,3,1
				c0.8,0.8,1.1,2,0.9,3.2c-1.8,8.1-0.7,12.3,1.7,16.4c1.9,2.7,2.9,5.8,2.9,9C47.2,144.7,40.3,151.6,31.7,151.6z" />
              </g>
              <g>
                <path fill="#665AA7" d="M26.1,137.3h-8.5c-2.4,0-4.3-1.9-4.3-4.3v-0.8c0-2.4,1.9-4.3,4.3-4.3h8.5c2.4,0,4.3,1.9,4.3,4.3v0.8
				C30.4,135.4,28.5,137.3,26.1,137.3z M17.6,130.2c-1.1,0-2.1,0.9-2.1,2.1v0.8c0,1.1,0.9,2.1,2.1,2.1h8.5c1.1,0,2.1-0.9,2.1-2.1
				v-0.8c0-1.1-0.9-2.1-2.1-2.1H17.6z" />
              </g>
              <g>
                <path fill="#665AA7" d="M26.1,144.5h-8.5c-2.4,0-4.3-1.9-4.3-4.3v-0.8c0-2.4,1.9-4.3,4.3-4.3h8.5c2.4,0,4.3,1.9,4.3,4.3v0.8
				C30.4,142.5,28.5,144.5,26.1,144.5z M17.6,137.3c-1.1,0-2.1,0.9-2.1,2.1v0.8c0,1.1,0.9,2.1,2.1,2.1h8.5c1.1,0,2.1-0.9,2.1-2.1
				v-0.8c0-1.1-0.9-2.1-2.1-2.1H17.6z" />
              </g>
              <g>
                <path fill="#665AA7" d="M26.1,151.6h-8.5c-2.4,0-4.3-1.9-4.3-4.3v-0.8c0-2.4,1.9-4.3,4.3-4.3h8.5c2.4,0,4.3,1.9,4.3,4.3v0.8
				C30.4,149.7,28.5,151.6,26.1,151.6z M17.6,144.5c-1.1,0-2.1,0.9-2.1,2.1v0.8c0,1.1,0.9,2.1,2.1,2.1h8.5c1.1,0,2.1-0.9,2.1-2.1
				v-0.8c0-1.1-0.9-2.1-2.1-2.1H17.6z" />
              </g>
            </g>
          </g>
          <g id="card">
            <g>
              <path fill="#E02E92" d="M178.4,203.4H56.8c-4.8,0-8.6-3.9-8.6-8.6V8.6c0-4.8,3.9-8.6,8.6-8.6h121.5c4.8,0,8.6,3.9,8.6,8.6v186.2
			C187,199.6,183.1,203.4,178.4,203.4z" />
            </g>
            <g>
              <rect x="144" fill="#363284" width="27.9" height="203.4" />
            </g>
          </g>
          <g id="front_hand">
            <g>
              <g>
                <path fill="#FFFFFF" d="M132.2,131.7c-2.6-4.5-3.7-9-1.9-17.2c0.4-1.6-1-3.1-2.6-2.8c-6.9,1.1-6.2,14.1-6.2,14.1H93.6
				c-2,0-3.6,1.6-3.6,3.6v0.1c0,2,1.6,3.6,3.6,3.6H104l0.4,21.4h16.2c7.9,0,14.4-6.4,14.4-14.4C135,137,134,134.1,132.2,131.7z" />
              </g>
              <g>
                <path fill="#DAEDF7" d="M125,125.7c0,0-0.6-2.5,0.8-6.9c0.6-1.9-2-2.9-3.3-0.6c0,0-0.9,1.5-0.9,7.3
				C124.5,125.7,125,125.7,125,125.7z" />
              </g>
              <g>
                <path fill="#665AA7" d="M120.6,155.6h-13.7c-2.6,0-4.7-2.1-4.7-4.7c0-1.4,0.6-2.7,1.6-3.6c-1-0.9-1.6-2.1-1.6-3.5
				c0-1.4,0.6-2.7,1.6-3.6c-1-0.9-1.6-2.1-1.6-3.5c0-0.9,0.3-1.8,0.7-2.5h-9.3c-2.6,0-4.8-2.1-4.8-4.8c0-2.7,2.1-4.8,4.8-4.8h26.7
				c0-4.1,0.8-13,7.2-14.1c1.1-0.2,2.2,0.2,3,1c0.8,0.8,1.1,2,0.9,3.2c-1.8,8.1-0.7,12.3,1.7,16.4c1.9,2.7,2.9,5.8,2.9,9
				C136.1,148.7,129.1,155.6,120.6,155.6z M108,147.3c0,0.6-0.5,1.1-1.1,1.1c-1.3,0-2.4,1.1-2.4,2.4c0,1.4,1.1,2.5,2.4,2.5h13.7
				c7.3,0,13.3-5.9,13.3-13.3c0-2.8-0.9-5.5-2.5-7.7c0,0,0-0.1-0.1-0.1c-2.6-4.4-4-9.2-2-18.1c0.1-0.4,0-0.8-0.3-1.1
				c-0.3-0.3-0.7-0.4-1-0.4c-4.9,0.8-5.3,9.6-5.3,11.9h1.6c0.6,0,1.1,0.5,1.1,1.1s-0.5,1.1-1.1,1.1H93.6c-1.4,0-2.5,1.1-2.5,2.5
				c0,1.4,1.1,2.6,2.5,2.6h13.2c0.6,0,1.1,0.5,1.1,1.1s-0.5,1.1-1.1,1.1c-1.3,0-2.4,1.1-2.4,2.4c0,1.2,0.8,2.2,2,2.4
				c0.5,0.1,0.9,0.6,0.9,1.1l0,0.1c0,0.5-0.4,1-0.9,1.1c-1.1,0.2-2,1.2-2,2.4c0,1.4,1.1,2.5,2.4,2.5
				C107.5,146.2,108,146.7,108,147.3z" />
              </g>
              <g>
                <path fill="#FFFFFF" d="M88.3,136" />
              </g>
            </g>
          </g>
          <g id="coins">
            <g>
              <g>
                <g>
                  <g>
                    <path fill="#ED912F" d="M206.4,216c0,1.5-1,2.7-2.5,3c-5.6,1.1-20.3,3.2-38.2,3.2s-32.6-2-38.2-3.2c-1.4-0.3-2.5-1.6-2.5-3
						v-4.8h81.4V216z" />
                  </g>
                  <g>
                    <ellipse fill="#F9C441" cx="165.8" cy="211.2" rx="40.7" ry="3.9" />
                  </g>
                </g>
                <g>
                  <g>
                    <path fill="#ED912F" d="M206.4,207.8c0,1.5-1,2.7-2.5,3c-5.6,1.1-20.3,3.2-38.2,3.2s-32.6-2-38.2-3.2c-1.4-0.3-2.5-1.6-2.5-3
						V203h81.4V207.8z" />
                  </g>
                  <g>
                    <ellipse fill="#F9C441" cx="165.8" cy="203" rx="40.7" ry="3.9" />
                  </g>
                </g>
                <g>
                  <g>
                    <path fill="#ED912F" d="M213.7,200.5c0,1.5-1,2.7-2.5,3c-5.6,1.1-20.3,3.2-38.2,3.2s-32.6-2-38.2-3.2c-1.4-0.3-2.5-1.6-2.5-3
						v-4.8h81.4V200.5z" />
                  </g>
                  <g>
                    <ellipse fill="#F9C441" cx="173" cy="195.7" rx="40.7" ry="3.9" />
                  </g>
                </g>
                <g>
                  <g>
                    <path fill="#ED912F" d="M196.4,192.8c0,1.5-1,2.7-2.5,3c-5.6,1.1-20.3,3.2-38.2,3.2s-32.6-2-38.2-3.2c-1.4-0.3-2.5-1.6-2.5-3
						V188h81.4V192.8z" />
                  </g>
                  <g>
                    <ellipse fill="#F9C441" cx="155.7" cy="188" rx="40.7" ry="3.9" />
                  </g>
                </g>
                <g>
                  <defs>
                    <path id="SVGID_1_" d="M195.9,192.5V188c0-2.1-18.3-3.9-40.8-3.9s-40.8,1.7-40.8,3.9v4.8c0,1.5,1.3,2.7,2.8,3
						c2.9,0.6,7.9,1.4,15.1,2v2.7c0,0.1,0.1,0.2,0.1,0.3c-4.6,0.6-7.2,1.4-7.2,2.2v4.8c0,1,0.5,1.9,1.3,2.5c-0.8,0.3-1.3,0.6-1.3,1
						v4.8c0,1.5,0.9,2.7,2.3,3c5.6,1.1,20.3,3.2,38.1,3.2c17.9,0,32.3-2,38-3.2c1.4-0.3,2.2-1.6,2.2-3v-4.8c0-0.3-0.4-0.7-1.3-1
						c0.8-0.6,1.3-1.5,1.3-2.5v-3.5c2.6-0.3,3.5-0.6,4.7-0.8c1.4-0.3,2.4-1.6,2.4-3v-4.8C212.7,194.4,205.6,193.2,195.9,192.5z" />
                  </defs>
                  <clipPath id="SVGID_2_">
                    <use xlink:href="#SVGID_1_" overflow="visible" />
                  </clipPath>
                </g>
              </g>
            </g>
            <g>
              <defs>
                <path id="SVGID_3_" d="M196.4,192.5V188c0-2.1-18.2-3.9-40.7-3.9c-0.1,0-0.2,0-0.3,0c-0.1,0-0.2,0-0.3,0c-5.6,0-11,0.1-15.8,0.3
				c3.5-3.5,6.1-6.3,7.6-8.1c0.9-1.1,1-2.8,0.1-3.9l-3-3.8c-1.3-1.7-16.7,8.3-34.3,22.3c-17.6,14-30.8,26.7-29.5,28.3l3,3.8
				c0.9,1.2,2.5,1.5,3.8,0.8c5.1-2.6,17.9-10.2,31.9-21.3c2.3-1.9,4.6-3.7,6.7-5.5c2,0.2,4.2,0.5,6.6,0.7v2.7c0,0.1,0.1,0.2,0.1,0.3
				c-4.6,0.6-7.2,1.4-7.2,2.2v4.8c0,1,0.5,1.9,1.3,2.5c-0.8,0.3-1.3,0.6-1.3,1v4.8c0,1.5,0.9,2.7,2.3,3c5.6,1.1,20.3,3.2,38.1,3.2
				c0.1,0,0.1,0,0.2,0c0.1,0,0.1,0,0.2,0c17.9,0,32.6-2,38.2-3.2c1.4-0.3,2.5-1.6,2.5-3v-4.8c0-0.3-0.4-0.7-1.3-1
				c0.8-0.6,1.3-1.5,1.3-2.5v-3.5c1.9-0.3,3.6-0.6,4.7-0.8c1.4-0.3,2.5-1.6,2.5-3v-4.8C213.7,194.4,206.8,193.2,196.4,192.5z" />
              </defs>
              <clipPath id="SVGID_4_">
                <use xlink:href="#SVGID_3_" overflow="visible" />
              </clipPath>
              <polygon opacity="0.24" clip-path="url(#SVGID_4_)" fill="#ED1C24" points="146.8,176.4 150.7,184.1 173.6,191.5 173.4,198.3 
			179.8,199.6 179.8,206.6 179.7,221.8 137.1,236.3 97.8,224.2 		" />
            </g>
            <g>
              <g>
                <path fill="#ED912F" d="M146.9,172.5c0.9,1.2,0.9,2.8-0.1,3.9c-3.7,4.4-14,15.1-28,26.2c-14,11.1-26.8,18.7-31.9,21.3
				c-1.3,0.7-2.9,0.3-3.8-0.8l-3-3.8l63.7-50.6L146.9,172.5z" />
              </g>
              <g>

                <ellipse transform="matrix(0.7832 -0.6217 0.6217 0.7832 -96.3369 111.7049)" fill="#F9C441" cx="112" cy="194" rx="40.7" ry="3.9" />
              </g>
            </g>
          </g>
          <g id="mouth">
            <g>
              <path fill="#363284" d="M106.3,86.3c-1,0-1.9-0.1-2.9-0.4c-0.6-0.2-0.9-0.8-0.8-1.4c0.2-0.6,0.8-0.9,1.4-0.8
			c2.2,0.6,4.4,0.3,6.4-0.7c2-1.1,3.4-2.9,4-5.1c0.2-0.6,0.8-0.9,1.4-0.8c0.6,0.2,0.9,0.8,0.8,1.4C115.2,83.2,110.9,86.3,106.3,86.3
			z" />
            </g>
          </g>
          <g id="right_eye_wink">
            <g display="inline">
              <path fill="#363284" d="M116.4,40.9c-0.4,0-0.7-0.2-0.9-0.5c-0.3-0.5-0.2-1.2,0.3-1.6c2.6-1.7,9.5-5.2,17.8-0.4
			c0.5,0.3,0.7,1,0.4,1.5c-0.3,0.5-1,0.7-1.5,0.4c-6.9-4-12.6-1.5-15.4,0.4C116.8,40.9,116.6,40.9,116.4,40.9z" />
            </g>
            <g display="inline">
              <path fill="#363284" d="M130.7,55.9c-0.2,0-0.5-0.1-0.7-0.2c-4.1-3.1-11.8-2.8-11.9-2.8c-0.5,0-0.9-0.3-1.1-0.8
			c-0.2-0.5,0-1,0.4-1.3c0.3-0.2,8.1-5.8,14.3-3.1c0.6,0.3,0.8,0.9,0.6,1.5c-0.3,0.6-0.9,0.8-1.5,0.6c-2.8-1.3-6.3-0.2-8.8,1
			c2.9,0.3,6.7,1.1,9.4,3.1c0.5,0.4,0.6,1.1,0.2,1.6C131.4,55.8,131.1,55.9,130.7,55.9z" />
            </g>
          </g>
          <g id="right_eye">
            <g>
              <path fill="#363284" d="M133.5,53.6c-0.6-0.3-1.2-0.6-1.8-0.9c0.1-0.5,0.2-0.9,0.2-1.4c0-4-3.2-7.3-7.3-7.3c-4,0-7.3,3.2-7.3,7.3
			c0,0.6,0.1,1.2,0.2,1.7c-0.8,0.4-1.4,0.8-1.9,1.1c-0.5,0.3-0.7,1-0.3,1.6c0.2,0.3,0.6,0.5,0.9,0.5c0.2,0,0.4-0.1,0.6-0.2
			c2.8-1.9,8.5-4.4,15.4-0.4c0.5,0.3,1.2,0.1,1.5-0.4C134.2,54.6,134,54,133.5,53.6z" />
              <g>
                <path fill="#FFFFFF" d="M123,45.8c0.2,0.2,0.3,0.5,0.1,0.7s-0.4,0.2-0.6,0c-0.2-0.2-0.4-0.4-0.2-0.6S122.8,45.6,123,45.8z" />
              </g>
              <g>
                <path fill="#FFFFFF" d="M122.2,47.5c0,0.6-0.5,0.4-1.1,0.4c-0.6,0-1.1,0.2-1.1-0.4c0-0.6,0.5-1.1,1.1-1.1
				C121.7,46.5,122.2,46.9,122.2,47.5z" />
              </g>
              <g>
                <path fill="#363284" d="M116.4,39.2c-0.4,0-0.7-0.2-0.9-0.5c-0.3-0.5-0.2-1.2,0.3-1.6c2.6-1.7,9.5-5.2,17.8-0.4
				c0.5,0.3,0.7,1,0.4,1.5c-0.3,0.5-1,0.7-1.5,0.4c-6.9-4-12.6-1.5-15.4,0.4C116.8,39.2,116.6,39.2,116.4,39.2z" />
              </g>
            </g>
          </g>
          <g id="left_eye">
            <g>
              <path fill="#363284" d="M85.5,53.6c-0.6-0.3-1.2-0.6-1.8-0.9c0.1-0.5,0.2-0.9,0.2-1.4c0-4-3.2-7.3-7.3-7.3c-4,0-7.3,3.2-7.3,7.3
			c0,0.6,0.1,1.2,0.2,1.7c-0.8,0.4-1.4,0.8-1.9,1.1c-0.5,0.3-0.7,1-0.3,1.6c0.2,0.3,0.6,0.5,0.9,0.5c0.2,0,0.4-0.1,0.6-0.2
			c2.8-1.9,8.5-4.4,15.4-0.4c0.5,0.3,1.2,0.1,1.5-0.4C86.2,54.6,86,54,85.5,53.6z" />
              <g>
                <path fill="#FFFFFF" d="M75,45.8c0.2,0.2,0.3,0.5,0.1,0.7s-0.4,0.2-0.6,0c-0.2-0.2-0.4-0.4-0.2-0.6S74.8,45.6,75,45.8z" />
              </g>
              <g>
                <path fill="#FFFFFF" d="M74.2,47.5c0,0.6-0.5,0.4-1.1,0.4c-0.6,0-1.1,0.2-1.1-0.4c0-0.6,0.5-1.1,1.1-1.1
				C73.7,46.5,74.2,46.9,74.2,47.5z" />
              </g>
              <g>
                <path fill="#363284" d="M68.4,39.2c-0.4,0-0.7-0.2-0.9-0.5c-0.3-0.5-0.2-1.2,0.3-1.6c2.6-1.7,9.5-5.2,17.8-0.4
				c0.5,0.3,0.7,1,0.4,1.5c-0.3,0.5-1,0.7-1.5,0.4c-6.9-4-12.6-1.5-15.4,0.4C68.8,39.2,68.6,39.2,68.4,39.2z" />
              </g>
            </g>
          </g>
          <g id="sunglasses">
            <g>
              <g>
                <path fill="#F9C441" d="M35.7,30v1.8c0,0.9,0.9,1.3,1.8,1.3h4.2v6.2c0,15.4,12.4,27.9,27.8,27.9l-0.1,0c12.6,0,23.2-8,26.6-19.6
				c0.7-2.5,2.7-4.5,5.2-5.1c3.7-0.8,7.2,1.5,8.2,4.9c3.3,11.3,13.2,19.2,25.2,19.8c16.2,0.7,29.1-12.7,29.1-28.9v-5.2h4.1
				c0.9,0,1.9-0.4,1.9-1.3V30c0-0.9-1-1.9-1.9-1.9H37.5C36.6,28.1,35.7,29.1,35.7,30z" />
              </g>
              <g>
                <defs>
                  <path id="SVGID_5_" d="M67.9,60.1c-11.7,0-22.2-8.9-22.2-20.8v-6.2h111v5.7c0,12.4-9.5,22.9-21.6,22.9l-0.1,0
					c-9.9-0.2-17.8-6.4-20.6-15.8c-1.5-5.3-6.3-9.1-11.8-9.1c-5.5,0-10.3,2.8-11.9,8.2c-2.8,9.5-11.4,15-21.4,15H67.9z" />
                </defs>
                <clipPath id="SVGID_6_">
                  <use xlink:href="#SVGID_5_" overflow="visible" />
                </clipPath>
                <g clip-path="url(#SVGID_6_)">
                  <path fill="#FFFFFF" d="M157.3,23.1h-9.2l-26.3,57h9.2L157.3,23.1z M145,23.1h-2.7l-26.3,57h2.7L145,23.1z" />
                </g>
                <g clip-path="url(#SVGID_6_)">
                  <path fill="#FFFFFF" d="M88.4,23.1h-9.2l-26.3,57h9.2L88.4,23.1z M76.1,23.1h-2.7l-26.3,57h2.7L76.1,23.1z" />
                </g>
              </g>
            </g>
          </g>
        </svg>
      </div>
    </div>
  </div>
</div> -->

<div class="container">
  <div class="row m-0">
    <div class="col-md-7 col-12">
      <div class="row d= gap-3">
        <div class="col-12 mb-4">
          <div class="row box-right">
            <div class="col-md-7 ps-0 ">
              <p class="ps-3 textmuted fw-bold h6 mb-0">TOTAL RECIEVED</p>
              <p class="h1 fw-bold d-flex"> <span class=" fas fa-dollar-sign textmuted pe-1 h6 align-text-top mt-1"></span>84,254 <span class="textmuted">.58</span> </p>
              <p class="ms-3 px-2 bg-green">+10% since last month</p>
            </div>
            <div class="col-md-4">
              <p class="p-blue"> <span class="fas fa-circle pe-2"></span>Pending </p>
              <p class="fw-bold mb-3"><span class="fas fa-dollar-sign pe-1"></span>1254 <span class="textmuted">.50</span> </p>
              <p class="p-org"><span class="fas fa-circle pe-2"></span>On drafts</p>
              <p class="fw-bold"><span class="fas fa-dollar-sign pe-1"></span>00<span class="textmuted">.00</span></p>
            </div>
          </div>
        </div>
        <div class="col-12 px-0 mb-4">
          <div class="box-right">
            <div class="d-flex pb-2">
              <p class="fw-bold h7"><span class="textmuted">quickpay.to/</span>Publicnote</p>
              <p class="ms-auto p-blue"><span class=" bg btn btn-primary fas fa-pencil-alt me-3"></span> <span class=" bg btn btn-primary far fa-clone"></span> </p>
            </div>
            <div class="bg-blue p-2">
              <P class="h8 textmuted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum recusandae dolorem voluptas nemo, modi eos minus nesciunt.
              <p class="p-blue bg btn btn-primary h8">LEARN MORE</p>
              </P>
            </div>
          </div>
        </div>
        <div class="col-12 px-0">
          <div class="box-right">
            <div class="d-flex mb-2">
              <p class="fw-bold">Create new invoice</p>
              <p class="ms-auto textmuted"><span class="fas fa-times"></span></p>
            </div>
            <div class="d-flex mb-2">
              <p class="h7">#AL2545</p>
              <p class="ms-auto bg btn btn-primary p-blue h8"><span class="far fa-clone pe-2"></span>COPY PAYMENT LINK </p>
            </div>
            <div class="row">
              <div class="col-12 mb-2">
                <p class="textmuted h8">Project / Description</p> <input class="form-control" type="text" placeholder="Legal Consulting">
              </div>
              <div class="col-6">
                <p class="textmuted h8">Issused on</p> <input class="form-control" type="text" placeholder="Oct 25, 2020">
              </div>
              <div class="col-6">
                <p class="textmuted h8">Due on</p> <input class="form-control" type="text" placeholder="Oct 25, 2020">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 col-12 ps-md-5 p-0 ">
      <div class="box-left">
        <p class="textmuted h8">Invoice</p>
        <p class="fw-bold h7">Alex Parkinson</p>
        <p class="textmuted h8">3897 Hickroy St, salt Lake city</p>
        <p class="textmuted h8 mb-2">Utah, United States 84104</p>
        <div class="h8">
          <div class="row m-0 border mb-3">
            <div class="col-6 h8 pe-0 ps-2">
              <p class="textmuted py-2">Items</p> <span class="d-block py-2 border-bottom">Legal Advising</span> <span class="d-block py-2">Expert Consulting</span>
            </div>
            <div class="col-2 text-center p-0">
              <p class="textmuted p-2">Qty</p> <span class="d-block p-2 border-bottom">2</span> <span class="d-block p-2">1</span>
            </div>
            <div class="col-2 p-0 text-center h8 border-end">
              <p class="textmuted p-2">Price</p> <span class="d-block border-bottom py-2"><span class="fas fa-dollar-sign"></span>500</span> <span class="d-block py-2 "><span class="fas fa-dollar-sign"></span>400</span>
            </div>
            <div class="col-2 p-0 text-center">
              <p class="textmuted p-2">Total</p> <span class="d-block py-2 border-bottom"><span class="fas fa-dollar-sign"></span>1000</span> <span class="d-block py-2"><span class="fas fa-dollar-sign"></span>400</span>
            </div>
          </div>
          <div class="d-flex h7 mb-2">
            <p class="">Total Amount</p>
            <p class="ms-auto"><span class="fas fa-dollar-sign"></span>1400</p>
          </div>
          <div class="h8 mb-5">
            <p class="textmuted">Lorem ipsum dolor sit amet elit. Adipisci ea harum sed quaerat tenetur </p>
          </div>
        </div>
        <div class="">
          <p class="h7 fw-bold mb-1">Pay this Invoice</p>
          <p class="textmuted h8 mb-2">Make payment for this invoice by filling in the details</p>
          <div class="form">
            <div class="row">
              <div class="col-12">
                <div class="card border-0"> <input class="form-control ps-5" type="text" placeholder="Card number"> <span class="far fa-credit-card"></span> </div>
              </div>
              <div class="col-6"> <input class="form-control my-3" type="text" placeholder="MM/YY"> </div>
              <div class="col-6"> <input class="form-control my-3" type="text" placeholder="cvv"> </div>
              <p class="p-blue h8 fw-bold mb-3">MORE PAYMENT METHODS</p>
            </div>
            <div class="btn btn-primary d-block h8">PAY <span class="fas fa-dollar-sign ms-2"></span>1400<span class="ms-3 fas fa-arrow-right"></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "./includes/footer.php"; ?>