<h1>Update Status</h1>

<head>
        <style scoped>
        .abc {
            float: right;
            margin: 1rem;
        }
        </style>
        <title>Blog</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Order_Code</th>
            <th scope="col">Order_Date</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
<tbody>

    @foreach ($data as $item)
    <tr>
        <td>{{$item->order_code}}</td>
        <td>{{$item->order_date}}</td>
        <td>{{$item->total}}</td>
        <td>
            <form action="{{'/edit/'.$item['id']}}" method="POST">
                @csrf
                <label>Status:</label>
                <select id="status" name="status">
                    <option value="{{$item->status}}">{{$item->status}}</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
                <input type="submit">
            </form>
        </td>
    </tr>
    @endforeach

</tbody>
</table>

