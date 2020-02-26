{{-- <form action="/bitem/update" method="post">
    @csrf
    <input type="text" name="id" :value="bitem.id">
    <input type="text" name="type" :value="bitem.type">
        <model-list-select :list='@json(\App\Team::get())'
                      v-model="bitem.team"
                      option-value="id"
                      option-text="name"
                      placeholder="Team">
         </model-list-select>
</form> --}}


<div class="fixed w-full h-full flex items-start pt-8 justify-center top-0 left-0" v-if="showBitemModal">
    <div class="absolute w-full h-full top-0 left-0" style="background: rgba(0,0,0,0.7); z-index: -1;" @@click="showBitemModal = false"></div>
    <div class="bg-white shadow-lg rounded px-8 pt-6 pb-4 mb-4 flex flex-col my-2 md:w-1/2 w-full">
        
        <div class="mb-2">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" 
                    for="team">
              Team
            </label>
            <div class="flex items-center justify-between">
                <model-list-select :list='@json(\App\Team::get())'
                      v-model="bitem.team_id"
                      option-value="id"
                      option-text="name"
                      id="team"
                      placeholder="Team">
                </model-list-select>
                <button class="p-3" @@click="resetbitem">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
            
        </div>

        <div class="mb-2">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" 
                    for="score">
              Type
            </label>
            <select v-model="bitem.type">
                <option disabled value="">Please select one</option>
                <option value="tbd">TBD</option>
                <option value="dnf">DNF</option>
                <option value="bye">BYE</option>
                <option value="team">Team</option>
              </select>
        </div>

        <div class="mb-8">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" 
                    for="score">
              Score
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-4" 
                    name="score" 
                    id="score" 
                    type="number" 
                    placeholder="0" 
                    v-model="bitem.score">
        </div>

        <div class="flex justify-between items-end">
        <span class="text-gray-400 text-xs">@{{ bitem.id }}</span>
            <button @@click.prevent="savebitem" class="cursor-pointer bg-blue-600 hover:bg-blue-500 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded">Save</button>
        </div>
        
    </div>
</div>
  