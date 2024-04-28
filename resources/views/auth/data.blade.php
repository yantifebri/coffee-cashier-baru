<div class="mt-4">
    <table class="table table-compact table-stripped" id="myTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama </th>
                <th>Email</th>
                <th>Password</th>


                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $p)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>

                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->password }}</td>



                    <td>

                        <form action="{{ route('register.destroy', $p->id) }}" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn delete-data btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>
