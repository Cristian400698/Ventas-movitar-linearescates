<!-- google fonts lato -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


<a href="/login" class="enter">ENTER</a>

<style>
    html,
    body {
        background-image: url('theme\images\index.jpg');
        position: relative;
        height: 100%;
        margin: 0;
        padding: 0;

    }

    .loaded {
        overflow-y: auto;
    }

    .main {
        display: none;
    }

    /* top left*/
    .tl {
        top: 0;
        top: -50%;
        left: -50%;
    }

    /* top right*/
    .tr {
        top: -50%;
        left: 50%;
    }

    /* botton left*/
    .bl {
        top: 50%;
        left: 50%;
    }

    /* botton right*/
    .br {
        top: 50%;
        left: -50%;
    }

    .enter:after,
    .enter:hover:after,
    .enter,
    .enter:hover {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        transition: all 1s ease;
    }

    .enter {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 100px;
        height: 100px;
        background-color: #2A2A2B;
        background-color: rgba(17, 17, 17, 0.67);
        z-index: 999999999;
        text-align: center;
        line-height: 100px;
        text-decoration: none;
        color: #FFF;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        -webkit-box-shadow: 0 0 15px 2px #000;
        -moz-box-shadow: 0 0 15px 2px #000;
        box-shadow: 0 0 15px 2px #000;
    }

    .enter:after {
        content: " ";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 80px;
        height: 80px;
        background-color: #3FB4BE;
        background-color: rgba(0, 235, 255, 0.44);
        z-index: 999999999;
        text-align: center;
        line-height: 80px;
        text-decoration: none;
        color: #FFF;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        -webkit-box-shadow: 0 0 15px 2px #000;
        -moz-box-shadow: 0 0 15px 2px #000;
        box-shadow: 0 0 15px 2px #000;
    }

    .enter:hover {
        -webkit-box-shadow: 0 0 4px 4px #3FB4BE;
        -moz-box-shadow: 0 0 4px 4px #3FB4BE;
        box-shadow: 0 0 4px 4px #3FB4BE;
    }

    .enter:hover:after {
        background-color: #2A2A2B;
        background-color: rgba(17, 17, 17, 0.67);
    }

    .hideThis {
        -webkit-box-shadow: 0 0 0 0 #3FB4BE;
        -moz-box-shadow: 0 0 0 0 #3FB4BE;
        box-shadow: 0 0 0 0 #3FB4BE;
        opacity: 0;
        z-index: -5;
    }

    /* Layout
============================== */

    *,
    *:before,
    *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    ::-webkit-scrollbar {
        background-color: #000;
        width: 5px;
        height: 5px;
    }

    ::-webkit-scrollbar-thumb {
        height: 10px;
        background-color: #333;
    }

</style>
