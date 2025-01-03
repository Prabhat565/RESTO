<x-guest-layout>

<!-- menu section -->
<section id="menu" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-0 col-md-12 col-sm-12 text-center">
				<h1 class="heading">Our Special Menus with Categories</h1>
				<hr>
			</div>

            @foreach ($category->menus as $menu)

                <div class="col-md-4 col-sm-4 mt-4 mb-4">
                    <img class="h-48" src="{{ Storage::url($menu->image) }}" alt="Image" />
                    <h4 class="uppercase">{{ $menu->name }} ................ <span>{{ $menu->price }}</span></h4>
                    <h5>{{ $menu->description }}</h5>
                    <!-- <button class="px-4 py-2 bg-green-600 text-green-50">Order Now</button> -->
                    <button class="px-4 py-2 bg-green-600 text-green-50" onclick="orderNow('{{ $menu->id }}')">Order Now</button>

                </div>

            @endforeach

		</div>
	</div>
</section>
</x-guest-layout>


<script>
    function orderNow(menuId) {
        // Example of making an AJAX request
        fetch(`/order/${menuId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ menuId: menuId })
        })
        .then(response => response.json())
        .then(data => {
            alert('Order added successfully!');
        })
        .catch(error => console.error('Error:', error));
    }
</script>
