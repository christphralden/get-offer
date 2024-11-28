<x-app-layout>
    <div class="flex flex-col justify-center items-center mx-10 my-20">
        <div class="w-full max-w-3xl p-6 bg-white shadow-md rounded mt-10">
            <h2 class="text-black font-bold text-2xl mb-6">Create Job Recruitment</h2>

            <form action="{{ route('addRecruitment.store') }}" method="POST">
                @csrf

                <!-- Position -->
                <div class="form-group mb-4">
                    <label for="position" class="block text-gray-700 font-semibold">Position</label>
                    <input id="position" type="text" name="position" class="form-control mt-1 block w-full" required>
                    @error('jobDetail.position')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Job Place -->
                <div class="form-group mb-4">
                    <label for="jobPlace" class="block text-gray-700 font-semibold">Job Place</label>
                    <input id="jobPlace" type="text" name="place" class="form-control mt-1 block w-full" required>
                    @error('jobDetail.place')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Salary -->
                <div class="form-group mb-4">
                    <label for="salary" class="block text-gray-700 font-semibold">Salary</label>
                    <input id="salary" type="number" name="salary" class="form-control mt-1 block w-full" required>
                    @error('jobDetail.salary')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Job Description -->
                <div class="form-group mb-4">
                    <label for="jobDesc" class="block text-gray-700 font-semibold">Job Description</label>
                    <textarea id="jobDesc" name="description" class="form-control mt-1 block w-full" rows="4" required></textarea>
                    @error('jobDesc')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- End Date -->
                <div class="form-group mb-4">
                    <label for="end_date" class="block text-gray-700 font-semibold">End Date</label>
                    <input id="end_date" type="date" name="end_date" class="form-control mt-1 block w-full" required>
                    @error('end_date')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Requirements -->
                <div class="form-group mb-4">
                    <label class="block text-gray-700 font-semibold">Requirements</label>
                    <div id="requirements" class="mb-2"></div>
                    <button type="button" onclick="addRequirement()" class="bg-blue-500 text-white rounded px-4 py-2">Add Requirement</button>
                    @error('requirement')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Criteria -->
                <div class="form-group mb-4">
                    <label class="block text-gray-700 font-semibold">Criteria</label>
                    <div id="criteria" class="mb-2"></div>
                    <button type="button" onclick="addCriteria()" class="bg-blue-500 text-white rounded px-4 py-2">Add Criteria</button>
                    @error('criteria')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center items-center mt-6">
                    <button type="submit" class="bg-black text-white rounded px-4 py-2 w-full ">
                        Create Recruitment
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        // Add Requirement Field
        function addRequirement() {
            const requirementsDiv = document.getElementById('requirements');
            const inputContainer = document.createElement('div');
            inputContainer.className = 'flex items-center mb-2';

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'requirement[]';
            input.className = 'form-control block w-full';
            input.placeholder = 'Enter requirement';

            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'bg-red-500 text-white rounded px-3 py-1 ml-2';
            deleteButton.innerText = 'Remove';
            deleteButton.onclick = () => inputContainer.remove();

            inputContainer.appendChild(input);
            inputContainer.appendChild(deleteButton);
            requirementsDiv.appendChild(inputContainer);
        }

        // Add Criteria Field
        function addCriteria() {
            const criteriaDiv = document.getElementById('criteria');
            const inputContainer = document.createElement('div');
            inputContainer.className = 'flex items-center mb-2';

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'criteria[]';
            input.className = 'form-control block w-full';
            input.placeholder = 'Enter criteria';

            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'bg-red-500 text-white rounded px-3 py-1 ml-2';
            deleteButton.innerText = 'Remove';
            deleteButton.onclick = () => inputContainer.remove();

            inputContainer.appendChild(input);
            inputContainer.appendChild(deleteButton);
            criteriaDiv.appendChild(inputContainer);
        }
    </script>
</x-app-layout>
