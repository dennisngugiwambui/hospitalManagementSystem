@extends('admin.app')

@section('content')

<style>
    .wrapper{
        background: rgb(113, 216, 116);
    }
    <style>
        /* Style for the search input */
.myInput {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: #f8f8f8;
  /* Add some fancy gradient background */
  background-image: linear-gradient(to bottom, #f8f8f8, #e8e8e8);
  /* Add some fancy text shadow */
  text-shadow: 1px 1px 1px #ddd;

}


/* Style for the search input when it's being focused */
.myInput:focus {
  border: 2px solid #1e4988;
  outline: none;
  box-shadow: 0 0 5px #6C9CE6;
}

/* Style for the search input placeholder */
.myInput::placeholder {
  color: #ccc;
  font-style: italic;
}

/* Style for the search input submit button */
.myInput + button {
  background-color: #6C9CE6;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  /* Add some fancy gradient background */
  background-image: linear-gradient(to bottom, #6C9CE6, #4C79AF);
  /* Add some fancy hover effect */
  transition: background-color 0.3s ease-in-out;
}

/* Style for the search input submit button when it's being hovered */
.myInput + button:hover {
  background-color: #4C79AF;
}
</style>
  <div class="container">
    <h1 style="background: rgb(209, 201, 203)">Pharmacy View</h1>
    {{-- <button class="btn btn-primary">Add medicine</button> --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMedicine">
        Add Medicine
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addMedicine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('pharmacy') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Medicine Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="medicine_name" class="form-control" id="inputPassword">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <input type="text" name="description" class="form-control" id="inputPassword">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                      <input type="number" name="quantity" class="form-control" id="inputPassword">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                          <span class="input-group-text">Ksh.</span>
                          <input type="text" class="form-control" id="price" name="price" inputmode="numeric" pattern="[0-9]*">
                        </div>
                      </div>
                  </div>
                  </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <input type="text" id="myInput" class="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <table class="table" id="myTable">
          <thead>
            <tr style="background: rgb(224, 69, 100); color:aquamarine;">
              <th>Medicine</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pharmacy as $medicine)
              <tr>
                <td>
                    {{ $medicine->medicine_name }}
                </td>
                <td>
                    {{ $medicine->quantity }}
                </td>
                <td>
                    @if ($medicine->quantity >=2)
                    {{ $medicine->price }}
                    @else
                    <button type="submit" class="btn btn-info btn-sm">Low stock</button>
                    @endif
                </td>
                <td>
                  <button type="submit" class="btn btn-danger btn-sm"> {{ $medicine->id }}</button>

                    {{-- {{ route('remove_medicine', $medicine->id) }} --}}
                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}
                    {{-- <button type="submit" class="btn btn-danger btn-sm">Remove</button> --}}
                </td>
            {{-- </form> --}}
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4>Give Medications</h4>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Assign Medicine
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Treatment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('pharmacy_patient') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Ticket Id</label>
                                <div class="col-sm-10">
                                  <input type="text" name="ticket_id" class="form-control-plaintext" id="staticEmail" placeholder="4XBJ">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Medicine</label>
                                <div class="col-sm-10">
                                  <select class="form-select" name="medicine[]" id="">
                                    <option disabled>--select--</option>
                                    @foreach ($pharmacy as $medicine)
                                    <option class="form-control">{{ $medicine->name }}</option>
                                    @endforeach
                                  </select>
                                  <button class="btn btn-secondary"> <i class="fa fa-plus"></i></button>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                  <input type="number" class="form-control" id="inputPassword">
                                </div>
                              </div>

                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script>
        // Get the select element for medicine_name
const selectElement = document.querySelector('select[name="medicine_name[]"]');

// Get the total_price field
const totalPriceField = document.getElementById('price');

// Initialize the total price variable
let totalPrice = 0;

// Add an event listener to the select element
selectElement.addEventListener('change', function() {
  // Get the selected option
  const selectedOption = selectElement.options[selectElement.selectedIndex];

  // Get the data-price attribute value of the selected option
  const price = parseFloat(selectedOption.getAttribute('data-price'));

  // Add the price to the total price
  totalPrice += price;

  // Set the value of the total_price field
  totalPriceField.value = totalPrice;
});

// Add an event listener to the add-medicine button
const addMedicineButton = document.querySelector('.add-medicine');
addMedicineButton.addEventListener('click', function() {
  // Create a new select element
  const newSelectElement = selectElement.cloneNode(true);

  // Add an event listener to the new select element
  newSelectElement.addEventListener('change', function() {
    // Get the selected option
    const selectedOption = newSelectElement.options[newSelectElement.selectedIndex];

    // Get the data-price attribute value of the selected option
    const price = parseFloat(selectedOption.getAttribute('data-price'));

    // Add the price to the total price
    totalPrice += price;

    // Set the value of the total_price field
    totalPriceField.value = totalPrice;
  });

  // Append the new select element to the dynamic_field div
  const dynamicField = document.getElementById('dynamic_field');
  dynamicField.appendChild(newSelectElement);
});

    </script>

    <script>
        function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        // Autofill ticket_id and medicine_name input fields
        var ticket_id_input = document.getElementById("ticket_id");
        var medicine_name_input = document.getElementById("medicine_name");
        ticket_id_input.value = txtValue; // Autofill ticket_id input field with the name
        medicine_name_input.value = ""; // Clear medicine_name input field
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    //Add Input Fields
    $(document).ready(function() {
        var max_fields = 20; //Maximum allowed input fields
        var wrapper = $(".medicine-group"); //Input fields wrapper
        var add_button = $(".add-medicine"); //Add button class or ID
        var x = 1; //Initial input field is set to 1

        //When user click on add input button
        $(add_button).click(function(e){
            e.preventDefault();
            //Check maximum allowed input fields
            if(x < max_fields){
                x++; //input field increment
                //add input field
                $(wrapper).append('<div class="wrapper" style="padding-top: 10px;"><select class="form-control forme" id="medicine' + x + '" name="medicine[]"><option disabled>--select--</option>@foreach ($pharmacy as $ph )<option>{{ $ph->medicine_name }}</option>@endforeach</select><div class="input-group-append"><button class="btn btn-secondary remove-medicine" type="button">-</button></div></div>');
            }
        });

        //when user click on remove button
        $(wrapper).on("click",".remove-medicine", function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //remove input field
            x--; //input field decrement
        });
    });
</script>

<script>
    const medicineNameInput = document.querySelector('input[name="medicine_name"]');
    const priceInput = document.querySelector('input[name="price"]');

    medicineNameInput.addEventListener('input', async () => {
      const response = await fetch(`/get-price/${medicineNameInput.value}`);
      const data = await response.json();
      priceInput.value = data.price;
    });
  </script>

@endsection
