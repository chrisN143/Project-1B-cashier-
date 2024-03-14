<div>
    <table class="my-3">
        <tbody>
            @foreach ($itemCounts as $itemCount)
                <tr>
                    <td>{{ $itemCount['product_name'] }}</td>
                    <td>{{ $itemCount['total_quantity'] }}</td>x    
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
