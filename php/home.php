<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
     <h1>Hello , my friend &nbsp; <?php echo $_SESSION['user_name']; ?></h1>
     <a href="../index.html"><h4>Click here to proceed</h4></a>
    <a href="logout.php"><h4>Logout</h4></a>

    <time id="time"></time>
    <h1 id="message"></h1>
    <h2 id="name" contenteditable="true"></h2>
    <h3 id="day"></h3>
    
    <script>
        const time = document.getElementById("time");
        const message = document.getElementById("message");
        const name = document.getElementById("name");
        const day = document.getElementById("day");


        name.addEventListener("keypress", setName);
        name.addEventListener("blur", setName);


        function showtime() {
            let dateToday = new Date();
            let hour = dateToday.getHours();
            let minute = dateToday.getMinutes();
            let seconds = dateToday.getSeconds();
            let date = dateToday.toDateString();

            const ampm = hour >= 12 ? 'P.M.' : 'A.M.';

            hour = hour % 12 || 12;

            hour = addZero(hour);
            minute = addZero(minute);
            seconds = addZero(seconds);


            time.innerHTML = `${hour}<span>:</span>${minute}<span>:</span>${seconds} ${ampm}`;
            day.innerHTML = `${date}`;
            setTimeout(showtime, 1000);
        }

        function addZero(n) {
            return (n < 10 ? '0' : '') + n;
        }

        function setmessage() {
            let dateToday = new Date();
            let hour = dateToday.getHours();

            if (hour < 12) {
                document.body.style.backgroundImage = 'url(https://images.pexels.com/photos/733100/pexels-photo-733100.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260)';
                message.innerHTML = "Good Morning";
            }
            else if (hour < 18) {
                document.body.style.backgroundImage = 'url(https://images.pexels.com/photos/316820/pexels-photo-316820.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260)';
                message.innerHTML = "Good Afternoon";
            }
            else {
                document.body.style.backgroundImage = 'url(https://images.pexels.com/photos/3083808/pexels-photo-3083808.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260)';
                message.innerHTML = "Good Evening";
                document.body.style.color = "white";
            }
        }

        function getName() {
            if (localStorage.getItem('Name') === null) {
                name.innerHTML = "Enter Your Name";
            }
            else {
                name.innerHTML = localStorage.getItem("Name");
            }
        }

        function setName(e) {
            if (e.type === "keypress") {
                if (e.keyCode == 13) {
                    localStorage.setItem("Name", e.target.innerHTML);
                    name.blur();
                }
            }
            else {
                localStorage.setItem("Name", e.target.innerHTML);
            }
        }

        showtime();
        setmessage();
        getName();
    </script>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>