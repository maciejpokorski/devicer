 <table class="table-fixed w-full">
     <thead>
         <tr class="bg-gray-100">
             <th class="px-4 py-2 w-20">Id</th>
             <th class="px-4 py-2">Name</th>
             <th class="px-4 py-2">Is Admin</th>
             <th class="px-4 py-2">Current device</th>
             <th class="px-4 py-2">Action</th>
         </tr>
     </thead>
     <tbody>

         @foreach($users as $user)
         <tr>
             <td class="border px-4 py-2">{{ $user->id }}</td>
             <td class="border px-4 py-2">{{ $user->name }}</td>
             <td class="border px-4 py-2">{{ $user->is_admin }}</td>
             <td class="border px-4 py-2">{{ $user->device ? $user->device->name : 'Not logged in' }}</td>
             <td class="border px-4 py-2">
                 <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                     <a href="{{route('users.edit', $user->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                         @csrf
                         @method('DELETE')
                         <button type="submit" title="delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                 </form>
             </td>
         </tr>
         @endforeach
     </tbody>
 </table>