<div class="px-4 py-2">
    <button wire:click="switchToSectionsMode({{ $courseId }})"
    class="px-6 py-2 text-white bg-indigo-600" type="button">Back
    </button>
    <button wire:click="switchToAddStudentMode()"
    class="px-6 py-2 text-white bg-indigo-600" type="button">Add student
    </button>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <h2 class="text-sm text-center">{{ session('message') }}</h2>
                        </div>
                    </div>
                </div>

                {{-- @if($isModalOpen)
                @include('livewire.admin-dashboard.create')
                @endif --}}
                @endif

                <table class="table-fixed w-full">
                    @if($isAddStudentToSectionModal)
                    @include('livewire.admin-dashboard.add-student-to-section')
                    @endif
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Phone</th>
                            <th class="px-2 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($section->students as $student)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $student->name }}</td>
                            <td class="border px-4 py-2">{{$student->user->email }}</td>
                            <td class="border px-4 py-2">{{ $student->phone}}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="confirmDeleteStudent({{ $student->id }})"class="px-6 py-2 text-white bg-red-600 " type="button"
                                    >Delete</button>
                                    @if($isDeleteStudentAlertOpen)
                                    @include('livewire.admin-dashboard.section-delete-student')
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
