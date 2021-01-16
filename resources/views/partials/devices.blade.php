 <table class="w-full whitespace-pre-wrap table-auto overflow-x-auto">
     <thead>
         <tr class="bg-gray-100">
             <th class="px-4 py-2 w-20">Id</th>
             <th class="px-4 py-2">Model</th>
             <th class="px-4 py-2">Destination</th>
             <th class="px-4 py-2">Serial Number</th>
             <th class="px-4 py-2">Name</th>
             <th class="px-4 py-2">Is Accessable</th>
             <th class="px-4 py-2">Inspection Time</th>
             <th class="px-4 py-2">Registration Number</th>
             <th class="px-4 py-2">Millage</th>
             <th class="px-4 py-2">Current User</th>
             <th class="px-4 py-2 float-left">Action</th>
         </tr>
     </thead>
     <tbody>
         @foreach($devices as $device)
         <tr>
             <td class="border px-4 py-2">{{ $device->id }}</td>
             <td class="border px-4 py-2">{{ $device->model }}</td>
             <td class="border px-4 py-2">{{ $device->destination }}</td>
             <td class="border px-4 py-2">{{ $device->serial_number }}</td>
             <td class="border px-4 py-2">{{ $device->name }}</td>
             <td class="border px-4 py-2">{{ $device->is_accessable ? 1 : 0}}</td>
             <td class="border px-4 py-2">{{ $device->inspection_time ?? 'Not inspected yet' }}</td>
             <td class="border px-4 py-2">{{ $device->registration_number }}</td>
             <td class="border px-4 py-2">{{ $device->millage }}</td>
             <td class="border px-4 py-2">{{ $device->user? $device->user->name : 'Not in use' }}</td>
             <td class="border px-4 py-2">
                 <form action="{{ route('devices.destroy', $device->id) }}" method="POST">
                     <a href="{{route('devices.edit', $device->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Edit</a>
                         @csrf
                         @method('DELETE')
                         <button type="submit" title="delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                 </form>
             </td>
         </tr>
         @endforeach
     </tbody>
 </table>