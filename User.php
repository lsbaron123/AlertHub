<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlertHub Dashboard</title>
    <link rel="icon" href="Logo/favicon-32x32.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">    
    <style>
        /* Font imports */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

    /* General styles */
    body {
        background: url('Background/lightbg.jpg') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        font-family: 'Roboto', sans-serif;
        color: #000; 
        backdrop-filter: blur(10px);
    }

    /* Header styles */
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5% 1%;
        font-size: 1em;
        margin-top: 0vh;
    }

    .logo {
        height: 9vh;
        max-height: 80px; /* Add this line to limit the maximum height */
        margin-right: 5px;
        transition: transform 0.3s ease;
        padding-right: 1px;
    }

    .logo:hover {
        transform: scale(1.2);
    }

    @keyframes shake {
        0% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        50% { transform: translateX(5px); }
        75% { transform: translateX(-5px); }
        100% { transform: translateX(0); }
    }

    .logo.shake {
        animation: shake 0.3s;
    }

    /* Navigation styles */
    .nav-container {
        display: flex;
        align-items: center;
        flex-grow: 1;
        margin-left: 2%;
    }

    nav ul {
        gap: 30px;
        list-style: none;
        margin: 0;
        margin-left: 8%;
        margin-top: 1.5%;
        padding: 0;
        display: flex;
        animation: fadeIn 1s ease-in-out;
    }

    nav ul li {
        margin-left: 7.5%;
        text-transform: uppercase;
        font-family: 'Titillium Web', sans-serif;
    }

    nav ul li a {
        text-decoration: none;
        color: #000;
        padding: 1% 2%;
        font-size: 1.15em;
        position: relative;
        transition: color 0.3s ease;
    }

    nav ul li a::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #000;
        visibility: hidden;
        transform: scaleX(0);
        transition: all 0.3s ease-in-out;
    }

    nav ul li a:hover::before,
    nav ul li a.active::before {
        visibility: visible;
        transform: scaleX(1);
    }

    nav ul li a:hover,
    nav ul li a.active {
        color: #000;
    }

        /* Hamburger menu styles */
    .hamburger {
        display: none;
        font-size: 1.5em;
        cursor: pointer;
    }

    @media screen and (max-width: 768px) {
        .nav-container {
        justify-content: space-between;
        align-items: center;
    }

    .nav-menu {
        display: none;
    }

    .hamburger {
        display: block;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1001;
    }

    .logo {
        z-index: 1002;
    }

    .nav-menu.active {
        display: flex;
        flex-direction: column;
        position: absolute;
        top: 60px;
        left: 0;
        width: 70%;
        background-color: rgba(0, 0, 0, 0.712);
        padding: 20px;
        z-index: 1000;
        text-align: center;
    }

    .nav-menu.active li {
        margin: 10px 0;
    }

    .nav-menu.active a {
        color: white;
    }

    /* Ensure right container stays in place */
    .right-container {
        position: absolute;
        right: 10px;
        top: 0%;
        transform: translateY(40%);
    }
    }

    /* Right container styles */
    .right-container {
        display: flex;
        align-items: center;
        margin-right: 10px;
        margin-top: 1.1%;
        padding: 5px;
    }

    .language-selector, .profile-icon, .theme-toggle {
        margin-left: 10%;
        cursor: pointer;
    }

    .profile-icon {
        height: 5vh;
        max-height: 47px;
    }

    /* Theme toggle styles */
    .theme-toggle {
        position: relative;
        width: 12vh;
        max-width: 50px;
        height: 3vh;
        max-height: 30px;
        background-color: #ccc;
        border-radius: 15px;
        transition: background-color 0.3s ease;
        border: 1px solid #000;
    }

    .theme-toggle .slider {
        position: absolute;
        top: 0.35vh;
        left: 0.35vh;
        width: 9vh;
        height: 2.3vh;
        max-width: 19px;
        max-height: 24px;
        background-color: #fff;
        border-radius: 50%;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
        
    .theme-toggle .slider img {
        width: 2vh;
        height: 2vh;
    }

    .theme-toggle.light .slider {
        background-color: orange;
        transform: translateX(0);
    }

    .theme-toggle.light {
        background-color: #fff;
    }

    .theme-toggle.dark .slider {
        background-color: rgba(22, 22, 22, 0.836);
        transform: translateX(1.8vh);
    }

    .theme-toggle.dark {
        background-color: #69626288;
    }

    /* Dark mode styles */
    .dark-mode {
        background: url('Background/darkbg.jpg') no-repeat center center fixed;
        background-size: cover;
        color: #fff;
        backdrop-filter: blur(10px);
    }

    .dark-mode nav ul li a {
        color: #fff;
    }

    .dark-mode nav ul li a::before {
        background-color: #fff;
    }

    .dark-mode nav ul li a:hover,
    .dark-mode nav ul li a.active {
        color: #fff;
    }

    .dark-mode .theme-toggle {
        border-color: #fff;
    }

    .dark-mode .theme-toggle.dark .slider {
        background-color: #222;
    }

    .dark-mode .theme-toggle.dark {
         background-color: #69626288;
    }

    /* Language dropdown styles */
    .flag-icon-container {
        width: 3.5vh;
        height: 3.5vh;
        max-width: 40px;
        max-height: 40px;
        border-radius: 50%;
        overflow: hidden;
        display: inline-block;
        position: relative;
        margin-right: 8px;
    }

    .flag-icon {
        width: 100%;
        height: 100%;
        position: absolute;
        transition: transform 0.3s ease;
    }

    .language-dropdown {
        position: relative;
        display: inline-block;
    }

    .language-dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 15.5vh;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        color: #000;
    }

    .language-dropdown-content div {
        padding: 0.8vh;
        font-size: 1em;
        cursor: pointer;
    }

    .language-dropdown-content div:hover {
        background-color: #f1f1f1;
    }

    .language-dropdown:hover .language-dropdown-content {
        display: block;
    }

    .dark-mode .language-dropdown-content {
        background-color: #333;
        color: #fff;
    }

    .dark-mode .language-dropdown-content div:hover {
        background-color: #444;
    }

    /* Announcements styles */
    .announcements {
        text-align: center;
        margin: 3vh 0;
        position: relative;
    }

    .announcements-header {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .announcements-images {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        width: 100vh;
        height: 60vh;
        max-width: 80vh;
        margin: 0 auto;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 1);
        border-radius: 2vh;
        perspective: 1000px;
    }

    .announcements-images img {
        position: absolute;
        width: calc(100% - 5vh);
        height: calc(100% - 5vh);
        object-fit: contain;
        transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        backface-visibility: hidden;
    }

    .dark-mode .announcements-images {
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        border-color: rgba(255, 255, 255, 0.9);
    }

    .dark-mode .announcements-images img {
        box-shadow: 0 0 60px rgba(0, 0, 0, 0);
    }

    .announcements-images img.active {
        opacity: 1;
        transform: translateZ(0) rotateY(0deg);
        z-index: 2;
    }

    .announcements-images img.inactive {
        opacity: 0;
        transform: translateZ(-100px) rotateY(-180deg);
        z-index: 1;
    }

    .announcements-indicators {
        display: flex;
        justify-content: center;
        margin-top: 2vh;
    }

    .announcements-indicators .indicator {
        width: 1.5vh;
        height: 1.5vh;
        background-color: #666161;
        border-radius: 50%;
        margin: 0 0.5vh;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .announcements-indicators .indicator.active {
        background-color: #222020;
    }

    .dark-mode .announcements-indicators .indicator {
        background-color: #bbb;
    }

    .dark-mode .announcements-indicators .indicator.active {
        background-color: #fff;
    }

    /* Call container styles */
    .call-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2vh;
        position: relative;
        margin-left: -0.5vh;
    }

    .call-container img {
        margin-top: -3vh;
        width: 19vh;
        height: 19vh;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .call-container img:hover {
        transform: scale(1.1);
        filter: drop-shadow(0 0 90px blue)
                drop-shadow(0 0 40px red);
        animation: glow 0.2s infinite alternate;
    }

    @keyframes glow {
        0% {
            filter: drop-shadow(0 0 10px blue)
            drop-shadow(0 0 40px blue);
            border-radius: 100%;
        }
        100% {
            filter: drop-shadow(0 0 10px red)
            drop-shadow(0 0 40px red);
            border-radius: 100%;
        }
    }

    .call-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .call-container img:hover + .call-text {
        opacity: 1;
        }

        /* Announcement popup styles */
    .announcement-popup {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0,0,0,0.4);
    }

    .announcement-popup-content {
        background-color: #f0f0f0;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 800px;
        max-height: 90vh;
        overflow-y: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .close-popup {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close-popup:hover,
    .close-popup:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .announcement-manager {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
        margin-bottom: 20px;
    }

    .announcement-item {
        position: relative;
        width: 100%;
        padding-top: 100%;
        overflow: hidden;
    }

    .announcement-item img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .erase-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .erase-btn:hover {
        background-color: #920202;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .add-btn, .apply-btn {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .add-btn:hover, .apply-btn:hover {
        background-color: #17d127;
    }


    /* Services styles */
    .services-title {
        text-align: center;
        margin-top: 2rem;
        font-size: 2.7em; /* Increased from 2.5em */
        color: #000000;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(65, 65, 65, 0.548);
    }

    .dark-mode .services-title {
        color: #ffffff;
        text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.644);
    }

    .services-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 5.5rem;
        margin-top: 3.5rem;
        perspective: 1000px;
    }

    .service-box {
        background-color: transparent;
        border-radius: 10px;
        width: 250px;
        height: 300px;
        perspective: 1000px;
        cursor: pointer;
        animation: floatAnimation 3s ease-in-out infinite;
    }

    @keyframes floatAnimation {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }

    .service-box:nth-child(2) {
        animation-delay: 0.5s;
    }

    .service-box-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }

    .service-box:hover .service-box-inner {
        transform: translateZ(-100px);
    }

    .service-box-front, .service-box-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        border-radius: 10px;
        transition: opacity 0.6s, transform 0.6s;
    }

    .service-box-front {
        background-color: #f9f9f9;
        color: #333;
        z-index: 2;
        border: 1px solid black;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.651);
    }

    .service-box-back {
        background-color: #6e8efb;
        color: white;
        font-size: 1em;
        opacity: 0;
        transform: translateZ(-100px);
        border: 1px solid black;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.651);
    }

    .service-box:hover .service-box-front {
        transform: translateZ(-200px);
        opacity: 0;
    }

    .service-box:hover .service-box-back {
        opacity: 1;
        transform: translateZ(0);
    }

    .service-box .service-icon {
        width: 120px;
        height: 120px;
        margin-bottom: 1.4rem;
    }

    .service-box h3 {
        margin: 0;
        font-size: 1.4em;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .service-box p {
        margin: 0;
        text-align: center;
        font-size: 1.1em;
        font-family: 'Roboto', sans-serif;
        line-height: 1.6;
    }

    .dark-mode .service-box-front {
        background-color: #444;
        color: #fff;
    }

    .dark-mode .service-box-back {
        background-color: #a777e3;
    }

    /* Service manager styles */
    .service-popup {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .service-popup-content {
        background-color: #f9f9f9;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 90%;
        max-width: 1200px;
        max-height: 90vh;
        overflow-y: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .service-manager {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
        max-height: calc(90vh - 200px);
        overflow-y: auto;
    }

    .service-editor {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .service-editor h3 {
        margin-top: 0;
        margin-bottom: 15px;
        color: #333;
    }

    .input-container {
        margin-bottom: 15px;
    }

    .input-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .input-container input,
    .input-container textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .input-container textarea {
        height: 100px;
        resize: vertical;
    }

    .button-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .add-service-btn,
    .apply-btn {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .add-service-btn {
        background-color: #4CAF50;
        color: white;
    }

    .apply-btn {
        background-color: #2196F3;
        color: white;
    }

    .add-service-btn:hover,
    .apply-btn:hover {
        opacity: 0.9;
    }

    .remove-service-btn {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .remove-service-btn:hover {
        background-color: #d32f2f;
    }

    .close-popup {
        color: #252323;
        float: right;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
        align-self: flex-end;
        margin-bottom: 1px;
        margin-top: 10px;
    }

    .close-popup:hover,
    .close-popup:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .image-input-container {
        display: flex;
        align-items: center;
    }

    .image-input-container input[type="text"] {
        flex-grow: 1;
        margin-right: 10px;
    }

    .upload-icon {
        cursor: pointer;
        font-size: 1.2em;
        color: #4CAF50;
    }

    .upload-icon:hover {
        color: #45a049;
    }

    /* Confirmation popup styles */
    .confirmation-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .confirmation-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        text-align: left;
        max-width: 600px;
        max-height: 80vh;
        overflow-y: auto;
        line-height: 1.4;
    }

    .confirmation-content h3 {
        font-size: 1.5em;
        font-family: 'Poppins', sans-serif;
        text-align: center;
    }

    .terms-text {
        margin-bottom: 20px;
    }

    .terms-checkbox {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .terms-checkbox input {
        margin-right: 10px;
    }

    .confirmation-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .confirmation-buttons button {
        padding: 10px 20px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .confirm-yes {
        background-color: #4CAF50;
        color: white;
        text-align: center;
        width: 6rem;
    }

    .confirm-no {
        background-color: #f44336;
        color: white;
        text-align: center;
        width: 6rem;
    }

    .confirm-yes:hover {
        background-color: #296d2c;
    }

    .confirm-no:hover {
        background-color: #aa2323;
    }

    .shake {
        animation: shake 0.5s;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    .dark-mode .confirmation-content {
        background-color: #333;
        color: white;
    }

    /* About page styles */
    .about-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 auto;
        width: 90%;
        max-width: 1000px;
        gap: 2rem;
        margin-top: 2.5rem;
    }

    .it-container {
        width: 100%;
    }

    .developers-title {
        font-size: 1.8em;
        margin-bottom: 0rem;
        margin-top: 0rem;
        text-align: center;
        font-family: 'Poppins', sans-serif;
    }

    .developers-box {
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        padding: 0.3rem 0;
    }

    .developer {
        position: relative;
        width: 205px;
        height: 205px;
        margin: 1.1rem;
        overflow: visible;
    }

    .developer-card {
        width: 100%;
        height: 100%;
        position: relative;
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.5));
    }

    .developer-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .developer-info {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        color: #ffffffe0;
        padding: 15px;
        opacity: 0;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        box-sizing: border-box;
    }

    .developer-info .fb-icon {
        width: 50px;
        height: 50px;
        margin-top: 10px;
        cursor: pointer;
        transition: transform 0.3s ease;
        filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
    }

    .developer-info .fb-icon:hover {
        transform: scale(1.15);
    }

    .developer:hover .developer-card {
        transform: scale(1.1);
    }

    .developer:hover .developer-img {
        filter: brightness(0.3);
    }

    .developer:hover .developer-info {
        opacity: 1;
    }

    .developer-info h4 {
        margin-top: 0;
        margin-bottom: 5px;
        font-size: 1.1em;
    }

    .developer-info p {
        margin: 2px 0;
        font-size: 0.8em;
        line-height: 1.2;
    }

    .alert-desc {
        width: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        border: 2px solid #000;
        border-radius: 10px;
        padding: 0.5rem;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 0rem;
    }

    .alert-desc h3 {
        font-size: 1.35em;
        margin-bottom: 0.4rem;
        color: #333;
        text-align: center;
    }

    .alert-desc p {
        font-size: 1.1em;
        line-height: 1.4;
        color: #333;
        text-align: center;
    }

    .dark-mode .about-title,
    .dark-mode .developers-title,
    .dark-mode .developer h3,
    .dark-mode .alert-desc h3 {
        color: #fff;
        text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.644);
    }

    .dark-mode .alert-desc {
        border-color: #fff;
        background-color: rgba(0, 0, 0, 0.8);
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.733);
    }

    .dark-mode .alert-desc p {
        color: #ccc;
    }

    .dark-mode .developer-img {
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.527);
    }

    .dark-mode .developer-img:hover {
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
    }

    /* About page popup styles */
    .about-popup {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0,0,0,0.4);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .about-popup-content {
        background-color: #f9f9f9;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .about-editor {
        margin-bottom: 20px;
    }

    .about-editor .input-container {
        margin-bottom: 15px;
    }

    .about-editor label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .about-editor input,
    .about-editor textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .about-editor textarea {
        height: 150px;
        resize: vertical;
    }

    .about-popup .apply-btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .about-popup .apply-btn:hover {
        background-color: #45a049;
    }

    .dark-mode .about-popup-content {
        background-color: #333;
        color: #fff;
    }

    .dark-mode .about-editor input,
    .dark-mode .about-editor textarea {
        background-color: #444;
        color: #fff;
        border-color: #555;
    }

    .dark-mode .about-popup .apply-btn {
        background-color: #45a049;
    }

    .dark-mode .about-popup .apply-btn:hover {
        background-color: #3d8b3d;
    }

    /* Contacts page styles */
    .contacts-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin: 0 auto;
        width: 90%;
        max-width: 1000px;
        margin-top: 2.5rem;
    }
    
    .contact-boxes {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
        width: 50%; /* Increased the width slightly */
        margin-right: 5%;
    }

    .contact-box {
        position: relative;
        width: 105%;
        height: 165px;
        background-color: #fff;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: stretch;
        box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.37);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }

    .contact-info {
        width: 155px;
        height: 110%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        padding: 0;
        border-right: 1px solid #ccc;
        flex-shrink: 0;
        margin-top: 9px;
    }

    .contact-title {
        font-size: 1.15em;
        margin: 0 0 8px 0;
        text-align: center;
        font-family: 'Poppins', sans-serif;
    }

    .contact-icon {
        width: 115px;
        height: 115px;
    }

    .nearest-info {
        flex-grow: 1;
        padding: 8px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        background-color: #fff;
        transition: box-shadow 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }

    .nearest-info span {
        font-weight: bold;
        margin-bottom: 7px;
        color: #1f1d1d;
        font-size: 1.15em; 
        margin-top: 4px;
    }

    .nearest-info p {
        margin: 0;
        font-size: 1.05em;
        color: #474545;
        font-family: 'Poppins', sans-serif;
    }

    .nearest-info .address {
        font-size: 1.05em;
        color: #423e3e;
        margin-top: 2.5px;
        margin-bottom: 20px;
    }

    .nearest-info .address a {
        color: inherit;
        text-decoration: none;
        display: inline-block;
        transition: color 0.3s ease;
    }
    
    .nearest-info .address a:hover {
        color: #4CAF50;
    }
    
    .map-marker {
        font-size: 19px;
        color: #423e3e;
        cursor: pointer;
        transition: transform 0.3s ease, color 0.3s ease;
    }
    
    .map-marker:hover {
        transform: scale(1.2);
        color: #4CAF50;
    }

    .contact-box:hover {
        transform: translateY(-5px);
        box-shadow: 8px 14px 20px rgba(0, 0, 0, 0.4);
    }

    .contact-box:hover .nearest-info {
        box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.1);
    }

    .feedback-section {
        width: 60%;
        background-color: rgba(255, 255, 255, 0.493);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.651);
    }

    .feedback-title {
        font-size: 1.6em;
        margin-bottom: 20px;
        text-align: center;
        font-family: 'Poppins', sans-serif;
        margin-top: -0.1rem;
    }

    .feedback-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .input-container {
        position: relative;
    }

    .feedback-form input,
    .feedback-form textarea {
        width: 95%;
        padding: 10px;
        border: 1px solid #3f3c3c;
        border-radius: 5px;
        font-size: 16px;
        background-color: #f0f0f0;
    }

    .feedback-form textarea {
        height: 100px;
    }

    .feedback-form label {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        background-color: #f0f0f0;
        padding: 0 5px;
        color: #777;
        pointer-events: none;
        transition: 0.3s ease all;
    }

    .feedback-form textarea + label {
        top: 20px;
        transform: translateY(0);
    }
    
    .feedback-form input:focus,
    .feedback-form textarea:focus {
        outline: none;
        border-color: #4CAF50;
    }

    .feedback-form input:focus + label,
    .feedback-form textarea:focus + label,
    .feedback-form input:not(:placeholder-shown) + label,
    .feedback-form textarea:not(:placeholder-shown) + label {
        top: 0;
        font-size: 12px;
        color: #4CAF50;
        background-color: #f0f0f0;
        transform: translateY(-50%);
    }


    .feedback-form button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .feedback-form button:hover {
        background-color: #45a049;
        transform: scale(1.01);
    }
    
    .feedback-form button:active {
        transform: scale(0.95);
    }

    /* Facebook icon styles */
    .social-media-icon {
         position: absolute;
         bottom: 11px;
         right: 64vh;
         z-index: 1000;
     }

     .social-media-icon .fb-icon {
         width: 70px;
         height: 70px;
         cursor: pointer;
         transition: transform 0.3s ease;
         filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.3));
     }

     .social-media-icon .fb-icon:hover {
         transform: scale(1.1);
     }

     .dark-mode .social-media-icon .fb-icon {
         filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.3));
     }

    .dark-mode .contacts-title {
        color: #ffffff;
        text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.644);
    }

    .dark-mode .contact-box {
        background-color: #333333;
        box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.37);
    }

    .dark-mode .contact-info {
        border-right-color: #555;
    }

    .dark-mode .nearest-info {
        background-color: #333;
        box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.3);
    }

    .dark-mode .nearest-info span {
        color: #fff;
    }

    .dark-mode .nearest-info p {
        color: #ccc;
    }

    .dark-mode .nearest-info .address {
        color: #d1cbcb;
    }

    .dark-mode .map-marker {
        color: #fff;
    }

    .dark-mode .map-marker:hover {
        color: #e2dbdb;
    }

    .dark-mode .contact-box:hover .nearest-info {
        box-shadow: 8px 14px 20px rgba(0, 0, 0, 0.4);
    }

    .dark-mode .feedback-section {
        background-color: rgba(48, 45, 45, 0.404);
        box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.37);
    }

    .dark-mode .feedback-form input,
    .dark-mode .feedback-form textarea {
        color: #ffffff;
        border-color: #555555;
        background-color: #444444;
    }

    .dark-mode .feedback-form label {
        color: #aaa;
        background-color: #444444;
    }

    .dark-mode .feedback-form input:focus + label,
    .dark-mode .feedback-form textarea:focus + label,
    .dark-mode .feedback-form input:not(:placeholder-shown) + label,
    .dark-mode .feedback-form textarea:not(:placeholder-shown) + label {
        color: #4CAF50;
        background-color: #444444;
    }

    .dark-mode .feedback-form button {
        background-color: #008000;
    }

    .dark-mode .feedback-form button:hover {
        background-color: #006600;
    }

    .dark-mode .contacts-title {
        color: #ffffff;
        text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.644);
    }

    .dark-mode .contact-box {
        background-color: #333333;
        box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.37);
    }

    .contacts-popup {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0,0,0,0.4);
    }

    .contacts-popup-content {
        background-color: #f0f0f0;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 800px;
        max-height: 90vh;
        overflow-y: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: -20vh;
    }

    .contact-editor {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .contact-editor .input-container {
        margin-bottom: 10px;
    }

    .contact-editor label {
        display: block;
        margin-bottom: 5px;
    }

    .contact-editor input[type="text"],
    .contact-editor textarea {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .contact-editor textarea {
        height: 100px;
        resize: vertical;
    }

    .image-input-container {
        display: flex;
        align-items: center;
    }

    .upload-icon {
        margin-left: 10px;
        cursor: pointer;
    }

    .dark-mode .contacts-popup-content {
        background-color: #333;
        color: #fff;
    }

    .dark-mode .contact-editor {
        border-color: #555;
    }

    .dark-mode .contact-editor input[type="text"],
    .dark-mode .contact-editor textarea {
        background-color: #444;
        color: #fff;
        border-color: #666;
    }

    /* Intro Animation */
    @keyframes slideInFromLeft {
        0% {
            transform: translateX(-100%);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInFromRight {
        0% {
            transform: translateX(100%);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInFromTop {
        0% {
            transform: translateY(-100%);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .intro-animation header {
        animation: slideInFromTop 1s ease-out;
    }

    .intro-animation #home-page .announcements {
        animation: slideInFromLeft 1s ease-out 0.3s;
        animation-fill-mode: both;
    }

    .intro-animation #home-page .call-container {
        animation: slideInFromRight 1s ease-out 0.5s;
        animation-fill-mode: both;
    }

    /* Profile dropdown styles */
    .profile-dropdown {
        position: relative;
        display: inline-block;
    }

    .profile-dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 110px;
        max-width: 170px;
        max-height: 200px; /* Set a maximum height */
        overflow-y: auto; /* Enable scrolling */
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .profile-dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .profile-dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .profile-dropdown:hover .profile-dropdown-content {
        display: block;
    }

    /* Add this CSS for the pop-out message */
    .popout-message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid black;    
        background-color: white;
        color: green;
        padding: 20px;
        border-radius: 10px;
        z-index: 1000;
        display: none; /* Initially hidden */
        transition: opacity 0.5s ease;
    }

    
</style>
</head>
<body>
    <header>
        <div class="nav-container">
            <img src="Logo/Alerthub.png" alt="Alerthub Logo" class="logo">
            <div class="hamburger">
                <i class="fas fa-bars"></i>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#home" class="active" data-page="home" data-translate="home">Home</a></li>
                    <li><a href="#services" data-page="services" data-translate="services">Services</a></li>
                    <li><a href="#about" data-page="about" data-translate="about">About</a></li>
                    <li><a href="#contacts" data-page="contacts" data-translate="contacts">Contacts</a></li>
                </ul>
            </nav>
        </div>
        <div class="right-container">
            <div class="language-dropdown">
                <div class="flag-icon-container">
                    <img src="Navigation/us.png" alt="US Flag" class="flag-icon">
                </div>
                <div class="language-dropdown-content">
                    <div data-lang="en">English (US)</div>
                    <div data-lang="fil">Filipino (PH)</div>
                </div>
            </div>
            <div class="profile-dropdown">
                <img src="Navigation/profile.png" alt="Profile Icon" class="profile-icon">
                <div class="profile-dropdown-content" style="width: 50px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <a href="Logout.php" class="logout-btn" style="display: flex; align-items: center; padding: 10px; color: black; background-color: white; border-radius: 8px; text-decoration: none; transition: background-color 0.3s;">
                        <i class="fas fa-sign-out" style="margin-right: 10px;"></i> Logout
                    </a>                
                </div>
            </div>
            <div class="theme-toggle light">
                <div class="slider">
                    <img src="Navigation/sun.png" alt="Sun Icon">
                </div>
            </div>

        </div>
    </header>
    <main>
        <div id="home-page">
            <div class="announcements">
                <div class="announcements-images">
                    <img src="Announcement/1.jpg" alt="Announcement 1" class="active">
                    <img src="Announcement/2.jpg" alt="Announcement 2" class="inactive">
                    <img src="Announcement/3.jpg" alt="Announcement 3" class="inactive">
                </div>
                <div class="announcements-indicators"></div>
            </div>
            <div class="call-container">
                <img src="Logo/call.png" alt="Call Us">
                <div class="call-text" data-translate="callNow">Call Now?</div>
            </div>
        </div>
        <div id="services-page" style="display: none;">
            <h2 class="services-title" data-translate="ourServices">Our Services</h2>
            <div class="services-container">
                <div class="service-box">
                    <div class="service-box-inner">
                        <div class="service-box-front">
                            <img src="Service/update.png" alt="Barangay Announcements & Updates" class="service-icon">
                            <h3 data-translate="announcementsUpdates">Announcements & Updates</h3>
                        </div>
                        <div class="service-box-back">
                            <p data-translate="announcementsUpdatesDesc">Stay informed with the latest news and information from your barangay officials. Access important updates, emergency alerts, upcoming events, and community announcements all in one place.</p>
                        </div>
                    </div>
                </div>
                <div class="service-box">
                    <div class="service-box-inner">
                        <div class="service-box-front">
                            <img src="Service/report.png" alt="Report and Call" class="service-icon">
                            <h3 data-translate="reportAndCall">Report and Call</h3>
                        </div>
                        <div class="service-box-back">
                            <p data-translate="reportAndCallDesc">Easily report local issues or request assistance. Use our simple interface to report concerns like infrastructure problems or safety issues. For urgent matters, directly call barangay offices with just a tap.</p>
                        </div>
                    </div>
                </div>
                <div class="service-box">
                    <div class="service-box-inner">
                        <div class="service-box-front">
                            <img src="Service/safety.png" alt="Complainant Safety" class="service-icon">
                            <h3 data-translate="complainantSafety">Complainant Safety</h3>
                        </div>
                        <div class="service-box-back">
                            <p data-translate="complainantSafetyDesc">Your safety and privacy are our top priorities. Report issues anonymously if you prefer, and rest assured that all communications are handled securely to protect you from any potential confrontation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="about-page" style="display: none;">
            <div class="about-container">
                <div class="alert-desc">
                    <h3 data-translate="alertHubTitle">Alert Hub: Your Community Safety Partner</h3>
                    <p data-translate="alertHubDesc">Alert Hub is a user-friendly mobile application designed to enhance public safety and community well-being in your barangay. Focused on ensuring the safety of every household, the app allows residents to report and address both serious crimes and minor inconveniences with ease. It bridges the gap between the community and local authorities, offering a streamlined way to report issues, even if they fall outside of official barangay channels.</p>
                </div>
                <div class="it-container">
                    <h3 class="developers-title" data-translate="developers">Developers</h3>
                    <div class="developers-box">
                        <div class="developer">
                            <div class="developer-card">
                                <img src="Developers/dev1.png" alt="Ramuel Panganiban" class="developer-img">
                                <div class="developer-info">
                                    <h4>Ramuel Panganiban</h4>
                                    <p><span data-translate="age">Age</span>: 21 years old</p>
                                    <p><span data-translate="course">Course</span>: Computer Engineer</p>
                                    <p><span data-translate="year">Year</span>: 4th Year</p>
                                    <p><span data-translate="position">Position</span>: IT Support / Web Developer</p>
                                    <a href="https://www.facebook.com/ramuel.panganiban.1" target="_blank" rel="noopener noreferrer">
                                        <img src="Logo/fb.png" alt="Facebook" class="fb-icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="developer">
                            <div class="developer-card">
                                <img src="Developers/dev2.png" alt="Jim Patrick Martinez" class="developer-img">
                                <div class="developer-info">
                                    <h4>Jim Patrick Martinez</h4>
                                    <p><span data-translate="age">Age</span>: 21 years old</p>
                                    <p><span data-translate="course">Course</span>: Computer Engineer</p>
                                    <p><span data-translate="year">Year</span>: 4th Year</p>
                                    <p><span data-translate="position">Position</span>: Head Web Developer</p>
                                    <a href="https://www.facebook.com/jimpatrick.martinez/" target="_blank" rel="noopener noreferrer">
                                        <img src="Logo/fb.png" alt="Facebook" class="fb-icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="developer">
                            <div class="developer-card">
                                <img src="Developers/dev3.png" alt="Kevin Gaza" class="developer-img">
                                <div class="developer-info">
                                    <h4>Kevin Gaza</h4>
                                    <p><span data-translate="age">Age</span>: 22 years old</p>
                                    <p><span data-translate="course">Course</span>: Computer Engineer</p>
                                    <p><span data-translate="year">Year</span>: 4th Year</p>
                                    <p><span data-translate="position">Position</span>: IT Support / Mobile App Developer</p>
                                    <a href="https://www.facebook.com/kebss.Gaza" target="_blank" rel="noopener noreferrer">
                                        <img src="Logo/fb.png" alt="Facebook" class="fb-icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="developer">
                            <div class="developer-card">
                                <img src="Developers/dev4.png" alt="Baron Mijares" class="developer-img">
                                <div class="developer-info">
                                    <h4>Baron Mijares</h4>
                                    <p><span data-translate="age">Age</span>: 22 years old</p>
                                    <p><span data-translate="course">Course</span>: Computer Engineer</p>
                                    <p><span data-translate="year">Year</span>: 4th Year</p>
                                    <p><span data-translate="position">Position</span>: Head Mobile App Developer</p>
                                    <a href="https://www.facebook.com/baronterence.mijares" target="_blank" rel="noopener noreferrer">
                                        <img src="Logo/fb.png" alt="Facebook" class="fb-icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="contacts-page" style="display: none;">
            <div class="contacts-container">
                <div class="contact-boxes">
                    <div class="contact-box">
                        <div class="contact-info">
                            <h3 class="contact-title" data-translate="policeStation">Police</h3>
                            <img src="Contacts/police.png" alt="Police" class="contact-icon">
                        </div>
                        <div class="nearest-info">
                            <span data-translate="nearestPolice">Nearest Police</span>
                            <p>Name: UBA POLICE COMMUNITY PRECINCT</p>
                            <p class="address"><a href="https://www.google.com/maps/dir/?api=1&destination=UBA+POLICE+COMMUNITY+PRECINCT,+P.+Noval+St.,+corner+Reten,+Sampaloc,+Maynila,+1008" target="_blank"><i class="fas fa-map-marker-alt map-marker"></i> P. Noval St. Reten, Sampaloc, Maynila</a></p>
                        </div>
                    </div>
                    <div class="contact-box">
                        <div class="contact-info">
                            <h3 class="contact-title" data-translate="hospital">Hospital</h3>
                            <img src="Contacts/medic.png" alt="Medic" class="contact-icon">
                        </div>
                        <div class="nearest-info">
                            <span data-translate="nearestHospital">Nearest Hospital</span>
                            <p>Name: MARY CHILES GENERAL HOSPITAL</p>
                            <p class="address"><a href="https://www.google.com/maps/dir/?api=1&destination=MARY+CHILES+GENERAL+HOSPITAL,+667+Dalupan+St,+Sampaloc,+Manila" target="_blank"><i class="fas fa-map-marker-alt map-marker"></i> 667 Dalupan St, Sampaloc, Manila</a></p>
                        </div>
                    </div>
                    <div class="contact-box">
                        <div class="contact-info">
                            <h3 class="contact-title" data-translate="fireStation">Fire Station</h3>
                            <img src="Contacts/fireman.png" alt="Fireman" class="contact-icon">
                        </div>
                        <div class="nearest-info">
                            <span data-translate="nearestFire">Nearest Fire Station</span>
                            <p>Name: TANDUAY FIRE STATION</p>
                            <p class="address"><a href="https://www.google.com/maps/dir/?api=1&destination=TANDUAY+FIRE+STATION,+Nicanor+Padilla+St,+San+Miguel,+Manila" target="_blank"><i class="fas fa-map-marker-alt map-marker"></i> Nicanor Padilla St, San Miguel, Manila</a></p>
                        </div>
                    </div>
                </div>
                <div class="feedback-section">
                    <h3 class="feedback-title" data-translate="feedbackSection">Report Section</h3>
                    <form class="feedback-form" id="feedbackForm" action="submit_feedback.php" method="POST">
                        <div class="input-container">
                            <input type="text" name="fullName" id="fullName" placeholder=" ">
                            <label for="fullName" autocomplete="off" data-translate="fullName">Enter Full Name (optional)</label>
                        </div>
                        <div class="input-container">
                            <input type="text" name="address" id="address" required placeholder=" "> <!-- Ensure this is set to required -->
                            <label for="address" autocomplete="off" data-translate="address">Enter Address</label> <!-- Updated label -->
                        </div>
                        <div class="input-container">
                            <textarea name="comment" id="comment" required placeholder=" "></textarea>
                            <label for="comment" autocomplete="off" data-translate="commentSuggestion">Describe report</label>
                        </div>
                        <button type="submit" data-translate="submit">Submit Report</button>
                    </form>
                </div>
            </div>
            <div class="social-media-icon">
                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
                    <img src="Logo/fb.png" alt="Facebook" class="fb-icon">
                </a>
            </div>
        </div>
    </main>
    <script src="translations.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Navigation functionality
            const navLinks = document.querySelectorAll('nav ul li a');
            const pages = document.querySelectorAll('main > div');

        
            function showPage(pageId) {
                pages.forEach(page => page.style.display = 'none');
                document.getElementById(pageId).style.display = 'block';
                
                // Apply intro animation only when showing the home page for the first time
                if (pageId === 'home-page' && !localStorage.getItem('homePageVisited')) {
                    applyIntroAnimation();
                    localStorage.setItem('homePageVisited', 'true');
                }
            }
        
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pageId = this.getAttribute('data-page') + '-page';
                    showPage(pageId);
                    navLinks.forEach(link => link.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        
            // Theme toggle functionality
            const themeToggle = document.querySelector('.theme-toggle');
            const slider = themeToggle.querySelector('.slider');
            themeToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                document.body.classList.toggle('dark-mode');
                themeToggle.classList.toggle('dark');
                themeToggle.classList.toggle('light');
                slider.querySelector('img').src = document.body.classList.contains('dark-mode') ? 'Navigation/moon.png' : 'Navigation/sun.png';
            });
        
        
            function showAnnouncementManager() {
                const popup = document.createElement('div');
                popup.className = 'announcement-popup';
                popup.innerHTML = `
                    <div class="announcement-popup-content">
                        <span class="close-popup">&times;</span>
                        <h2>Manage Announcements</h2>
                        <div class="announcement-manager"></div>
                        <div class="button-container">
                            <input type="file" id="add-image" accept="image/*" style="display: none;">
                            <button class="add-btn">Add New</button>
                            <button class="apply-btn">Apply Changes</button>
                        </div>
                    </div>
                `;
                document.body.appendChild(popup);
        
                // Center the popup content
                const popupContent = popup.querySelector('.announcement-popup-content');
                popupContent.style.position = 'fixed';
                popupContent.style.top = '50%';
                popupContent.style.left = '50%';
                popupContent.style.transform = 'translate(-50%, -50%)';
        
                const closeBtn = popup.querySelector('.close-popup');
                closeBtn.onclick = function() {
                    popup.remove();
                }
        
                updateAnnouncementManager();
        
                const addBtn = popup.querySelector('.add-btn');
                const fileInput = popup.querySelector('#add-image');
                
                addBtn.onclick = function() {
                    fileInput.click();
                }
        
                fileInput.onchange = function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const newItem = createAnnouncementItem(e.target.result);
                            const manager = popup.querySelector('.announcement-manager');
                            manager.appendChild(newItem);
                        }
                        reader.readAsDataURL(file);
                    }
                }
        
                const applyBtn = popup.querySelector('.apply-btn');
                applyBtn.onclick = function() {
                    const newImages = Array.from(popup.querySelectorAll('.announcement-item img'));
                    announcementsImages.innerHTML = ''; // Clear existing images
                    newImages.forEach((img, index) => {
                        const newImg = document.createElement('img');
                        newImg.src = img.src;
                        newImg.alt = `Announcement ${index + 1}`;
                        newImg.className = index === 0 ? 'active' : 'inactive'; // Ensure the first image is active
                        announcementsImages.appendChild(newImg);
                    });
                    updateAnnouncementCarousel();
                    
                    // Save the current images to local storage
                    const currentImages = Array.from(announcementsImages.querySelectorAll('img')).map(img => img.src);
                    localStorage.setItem('announcementImages', JSON.stringify(currentImages)); // Update local storage after applying changes
                    popup.remove();
                }
            }
        
            function updateAnnouncementManager() {
                const popup = document.querySelector('.announcement-popup');
                const manager = popup.querySelector('.announcement-manager');
                manager.innerHTML = '';
                const images = document.querySelectorAll('.announcements-images img');
                images.forEach((img) => {
                    const item = createAnnouncementItem(img.src);
                    manager.appendChild(item);
                });
            }
        
            function createAnnouncementItem(imgSrc) {
                const item = document.createElement('div');
                item.className = 'announcement-item';
                item.innerHTML = `
                    <img src="${imgSrc}" alt="Announcement">
                    <button class="erase-btn">X</button>
                `;
                
                const eraseBtn = item.querySelector('.erase-btn');
                eraseBtn.onclick = function() {
                    item.remove();
                    updateLocalStorageAfterRemoval(); // Update local storage after removal
                }
                
                return item;
            }
        
            function showServiceManager() {
                const popup = document.createElement('div');
                popup.className = 'service-popup';
                popup.innerHTML = `
                    <div class="service-popup-content">
                        <span class="close-popup">&times;</span>
                        <h2>Manage Services</h2>
                        <div class="service-manager"></div>
                        <button class="add-service-btn">Add New Service</button>
                        <button class="apply-btn">Apply Changes</button>
                    </div>
                `;
                document.body.appendChild(popup);
        
                const closeBtn = popup.querySelector('.close-popup');
                closeBtn.onclick = function() {
                    popup.remove();
                }
        
                updateServiceManager();
        
                const addServiceBtn = popup.querySelector('.add-service-btn');
                addServiceBtn.onclick = function() {
                    const newServiceEditor = createServiceEditor(document.querySelectorAll('.service-editor').length, 'New Service', 'default-image.png', 'New service description');
                    popup.querySelector('.service-manager').appendChild(newServiceEditor);
                }
        
                const applyBtn = popup.querySelector('.apply-btn');
                applyBtn.onclick = function() {
                    applyServiceChanges();
                    popup.remove();
                }
            }

        // Language selector functionality
        const languageDropdown = document.querySelector('.language-dropdown');
        const flagIcon = document.querySelector('.flag-icon');
        let currentLang = 'en';

        function updateLanguage(lang) {
            currentLang = lang;
            document.querySelectorAll('[data-translate]').forEach(element => {
                const key = element.getAttribute('data-translate');
                element.textContent = translations[lang][key];
            });
        }

        languageDropdown.addEventListener('click', function(event) {
            if (event.target.tagName === 'DIV') {
                flagIcon.style.transform = 'translateX(-100%)';
                setTimeout(() => {
                    flagIcon.src = event.target.dataset.lang === 'en' ? 'Navigation/us.png' : 'Navigation/ph.png';
                    updateLanguage(event.target.dataset.lang);
                    flagIcon.style.transform = 'translateX(0)';
                }, 300);
            }
        });

        // Announcement carousel functionality
        let announcementImages;
        let announcementIndex = 0;
        const indicatorsContainer = document.querySelector('.announcements-indicators');
        const announcementsImages = document.querySelector('.announcements-images');

        function updateAnnouncementCarousel() {
            announcementImages = document.querySelectorAll('.announcements-images img');
            announcementIndex = 0;
            updateAnnouncementDisplay();
            
            indicatorsContainer.innerHTML = '';
            
            announcementImages.forEach((_, index) => {
                const indicator = document.createElement('div');
                indicator.classList.add('indicator');
                if (index === announcementIndex) {
                    indicator.classList.add('active');
                }
                indicator.addEventListener('click', () => {
                    announcementIndex = index;
                    updateAnnouncementDisplay();
                });
                indicatorsContainer.appendChild(indicator);
            });

            if (announcementImages.length > 0) {
                announcementImages[0].classList.add('active');
            }
        }

        function updateAnnouncementDisplay() {
            announcementImages.forEach((img, index) => {
                if (index === announcementIndex) {
                    img.classList.remove('inactive');
                    img.classList.add('active');
                } else {
                    img.classList.remove('active');
                    img.classList.add('inactive');
                }
            });
            updateIndicators();
        }

        function updateIndicators() {
            const indicators = document.querySelectorAll('.announcements-indicators .indicator');
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === announcementIndex);
            });
        }

        function nextAnnouncementImage() {
            announcementIndex = (announcementIndex + 1) % announcementImages.length;
            updateAnnouncementDisplay();
        }
        
        updateAnnouncementCarousel();

        let carouselInterval = setInterval(nextAnnouncementImage, 4000);

        // Call confirmation functionality
        const callImage = document.querySelector('.call-container img');
        callImage.addEventListener('click', showTermsAndConditions);

        function showTermsAndConditions() {
            const termsPopup = document.createElement('div');
            termsPopup.className = 'confirmation-popup';
            termsPopup.innerHTML = `
                <div class="confirmation-content">
                    <h3 data-translate="termsTitle">Terms and Conditions for AlertHub</h3>
                    <div class="terms-text">
                        <p data-translate="termsIntro">By using AlertHub, you agree to the following terms. Please read them carefully.</p>
                        <ol>
                            <li><strong data-translate="acceptanceTitle">Acceptance of Terms</strong><br><span data-translate="acceptanceText">By accessing or using the app, you agree to these terms. If you do not agree, do not use AlertHub.</span></li>
                            <li><strong data-translate="appUseTitle">App Use</strong><br><span data-translate="appUseText">AlertHub is for reporting community issues and receiving updates. Use it responsibly and for lawful purposes only.</span></li>
                            <li><strong data-translate="reportingTitle">Reporting and Communication</strong>
                                <ul>
                                    <li><span data-translate="accuracyText">Accuracy: Provide accurate information when reporting. False reporting can lead to penalties.</span></li>
                                    <li><span data-translate="prankCallsText">Prank Calls: Prank calls or false reports are prohibited and may result in legal penalties.</span></li>
                                    <li><span data-translate="anonymousReportingText">Anonymous Reporting: You can report issues anonymously, but your identity may be disclosed in legal cases if required.</span></li>
                                </ul>
                            </li>
                            <li><strong data-translate="privacyTitle">Privacy and Data Security</strong><br><span data-translate="privacyText">We prioritize your privacy and secure all communications. For details, see our Privacy Policy.</span></li>
                            <li><strong data-translate="updatesTitle">Barangay Updates</strong><br><span data-translate="updatesText">We provide official barangay updates. However, Alerthub is not responsible for delays or inaccuracies in the information.</span></li>
                            <li><strong data-translate="liabilityTitle">Limitation of Liability</strong><br><span data-translate="liabilityText">AlertHub is not responsible for any issues or damages arising from app use, including technical problems or delayed responses.</span></li>
                            <li><strong data-translate="terminationTitle">Termination</strong><br><span data-translate="terminationText">We may suspend or terminate access if the app is misused or these terms are violated.</span></li>
                            <li><strong data-translate="governingLawTitle">Governing Law</strong><br><span data-translate="governingLawText">These terms are governed by the laws of the Republic of the Philippines.</span></li>
                        </ol>
                    </div>
                    <div class="terms-checkbox">
                        <input type="checkbox" id="agreeTerms">
                        <label for="agreeTerms" data-translate="agreeTerms">I have read and agreed to the terms and conditions.</label>
                    </div>
                    <div class="confirmation-buttons">
                        <button class="confirm-yes" data-translate="confirmYes">Yes</button>
                        <button class="confirm-no" data-translate="confirmNo">Cancel</button>
                    </div>
                </div>
            `;
            document.body.appendChild(termsPopup);

            const agreeCheckbox = document.getElementById('agreeTerms');
            const confirmYesButton = termsPopup.querySelector('.confirm-yes');
            const confirmNoButton = termsPopup.querySelector('.confirm-no');

            confirmYesButton.addEventListener('click', function() {
                if (agreeCheckbox.checked) {
                    termsPopup.remove();
                    window.location.href = 'tel:+639299717739'; // Initiates the call
                } else {
                    confirmYesButton.classList.add('shake');
                    setTimeout(() => confirmYesButton.classList.remove('shake'), 500);
                }
            });

            confirmNoButton.addEventListener('click', function() {
                termsPopup.remove();
            });

            // Update the language of the terms and conditions
            updateLanguage(currentLang);
        }

        // Hamburger menu functionality
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');
        const rightContainer = document.querySelector('.right-container');

        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            rightContainer.classList.toggle('active');
            hamburger.classList.toggle('active');
        });

        // Close menu when a nav link is clicked
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                rightContainer.classList.remove('active');
                hamburger.classList.remove('active');
            });
        });

        // Map marker functionality
        const mapMarkers = document.querySelectorAll('.map-marker');
        mapMarkers.forEach(marker => {
            marker.addEventListener('click', function() {
                const address = this.getAttribute('data-address');
                if (address) {
                    const mapsUrl = `https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(address)}`;
                    window.open(mapsUrl, '_blank');
                }
            });
        });

        // Intro animation function
        function applyIntroAnimation() {
            document.body.classList.add('intro-animation');
            setTimeout(() => {
                document.body.classList.remove('intro-animation');
            }, 1000);
        }

        // Initially show the home page
        showPage('home-page');

        // Initialize the carousel on page load
        updateAnnouncementCarousel();

        // Function to load images from the server
        function loadImagesFromServer() {
            fetch('get_announcements.php') // Fetch the images from the server
                .then(response => response.json())
                .then(images => {
                    const announcementsImages = document.querySelector('.announcements-images');
                    announcementsImages.innerHTML = ''; // Clear existing images
                    images.forEach((src, index) => {
                        const img = document.createElement('img');
                        img.src = `Announcement/${src}`; // Set the image source
                        img.alt = `Announcement ${index + 1}`;
                        img.className = index === 0 ? 'active' : 'inactive'; // Ensure the first image is active
                        announcementsImages.appendChild(img);
                    });
                    updateAnnouncementCarousel(); // Ensure carousel is updated after loading images
                })
                .catch(error => console.error('Error fetching images:', error));
        }

        // Call the load function when the DOM is fully loaded
        loadImagesFromServer();

        function updateLocalStorageAfterRemoval() {
            const currentImages = Array.from(document.querySelectorAll('.announcements-images img')).map(img => img.src);
            localStorage.setItem('announcementImages', JSON.stringify(currentImages));
        }

        const feedbackForm = document.getElementById('feedbackForm');
        feedbackForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            const formData = new FormData(feedbackForm);
            
            fetch(feedbackForm.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Clear the feedback section
                feedbackForm.reset(); // Clear the form inputs

                // Create and display the pop-out message
                const popoutMessage = document.createElement('div');
                popoutMessage.className = 'popout-message';
                popoutMessage.textContent = data.message; // Set the message from the response
                popoutMessage.style.color = data.status === "success" ? "green" : "red"; // Set color based on status
                document.body.appendChild(popoutMessage); // Append message to body

                // Show the message
                popoutMessage.style.display = 'block';
                popoutMessage.style.opacity = '1';

                // Hide the message after 2 seconds
                setTimeout(() => {
                    popoutMessage.style.opacity = '0'; // Fade out
                    setTimeout(() => {
                        popoutMessage.remove(); // Remove from DOM after fade out
                    }, 500); // Wait for fade out to complete
                }, 2000); // Show for 2 seconds
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
</html>