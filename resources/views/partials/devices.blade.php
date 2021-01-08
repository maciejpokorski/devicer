 <table class="table-fixed w-full">
     <thead>
         <tr class="bg-gray-100">
             <th class="px-4 py-2 w-20">Id</th>
             <th class="px-4 py-2">Model</th>
             <th class="px-4 py-2">Name</th>
             <th class="px-4 py-2">Action</th>
         </tr>
     </thead>
     <tbody>
         @foreach($devices as $device)
         <tr>
             <td class="border px-4 py-2">{{ $device->id }}</td>
             <td class="border px-4 py-2">{{ $device->model }}</td>
             <td class="border px-4 py-2">{{ $device->name }}</td>
             <td class="border px-4 py-2">
                 <button wire:click="edit({{ $device->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                 <button wire:click="delete({{ $device->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
             </td>
         </tr>
         @endforeach
     </tbody>
 </table>