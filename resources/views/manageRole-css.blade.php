<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }

    header {
        background: linear-gradient(to right, #4a77d4, #64b6ff);
        color: white;
        padding: 20px;
        text-align: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: 600;
    }

    .form-group {
        margin-bottom: 20px;
    }

    input[type="text"] {
        width: calc(100% - 24px);
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus {
        outline: none;
        border-color: #4a77d4;
    }

    button {
        padding: 12px 24px;
        background-color: #4a77d4;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #64b6ff;
    }

    footer {
        background: linear-gradient(to right, #4a77d4, #64b6ff);
        color: white;
        text-align: center;
        padding: 20px;
        border-radius: 0 0 8px 8px;
        box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1);
    }
    li,ul{
        list-style:none !important;
        display: inline-block;
    }
    .addPermission-div{
        position: absolute;
        top: 50%;
        left: 87%;
        transform: translate(-50%,-50%);
        width:20%;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        display: none;
    }
</style>