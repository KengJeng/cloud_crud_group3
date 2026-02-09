<!DOCTYPE html>
<html>
<head>
    <title>Coffee Menu</title>
</head>
<body>

<h1>Coffee Menu</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

    @foreach ($coffees as $coffee)
    <tr>
        <td>{{ $coffee->id }}</td>
        <td>{{ $coffee->name }}</td>
        <td>{{ $coffee->category }}</td>
        <td>₱{{ number_format($coffee->price, 2) }}</td>
        <td>
            <button onclick="deleteCoffee({{ $coffee->id }})">
                Delete
            </button>
        </td>
    </tr>
    @endforeach

</table>

<script>
// Call CoffeeController
function deleteCoffee(id) {
    if (!confirm('Are you sure you want to delete this coffee?')) {
        return;
    }

    fetch(`/coffees/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        location.reload(); // refresh list
    })
    .catch(error => {
        console.error(error);
        alert('Failed to delete coffee');
    });
}
</script>

</body>
</html>
