<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Courses</title>
</head>
<body>
<h1>All Courses</h1>
{% if courses is empty %}
<p>No courses found</p>
{% else %}
<ul>
    {% for course in courses %}
    <li>{{ course.name }}</li>
    {% endfor %}
</ul>
{% endif %}

<a href="/courses/create">Create new course</a>
</body>
</html>
