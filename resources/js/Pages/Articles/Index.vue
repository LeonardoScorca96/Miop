<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head,item } from '@inertiajs/inertia-vue3';
import {defineProps,} from 'vue';
import { Inertia } from "@inertiajs/inertia";

const props = defineProps(['Title', 'Subtitle', 'Mony', 'Amount','id','user_id','article','item','articles'])


const form = useForm({
    Title: '',
    Subtitle: '',
    Mony: '',
    Amount: '',
    id: '',
    user_id:''
})



function save() {
    console.log(form);
    form.post('/saveArticle', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            alert('creato')
        }
    })
}

function update() {
    console.log(form);
    form.post('/updateArticle/{id}', {
        preserveScroll: true,
        onSuccess: () => {
            alert('aggiornato')
        }
    })
}

function destroy() {
    console.log(form);
    form.post('/deleteArticle{$id}', {
        preserveScroll: true,
        onSuccess: () => {
            alert('elimina')
        }
    })
}




</script>
 
<template>

    <Head title="Articles" />

    <AuthenticatedLayout>
        <div class="w-full flex">


            <div class="w-1/2 max-w-xs mx-4 my-10 " >
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="form.post(route('articles'))">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Title
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text"   v-model="form.Title">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Subtitle
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" v-model="form.Subtitle">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Mony
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="number"  v-model="form.Mony">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Amount
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="number" v-model="form.Amount">
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="button" @click="save">
                            Sign In
                        </button>
    
                    </div>
                </form>
    
            </div>
            <div class="w-1/2  p-10 mx-auto">
                <table class="table-fixed w-full ">
                    <thead class=" w-full col " >
                        <tr class="flex-7  justify-between ">
                            <th class=" border-red-200 border-2 ">id</th>
                            <th class=" border-red-200 border-2 ">eser_id</th>
                            <th class=" border-red-200 border-2 ">Titolo</th>
                            <th class=" border-red-200 border-2 ">Subtitolo</th>
                            <th class=" border-red-200 border-2 ">Mony</th>
                            <th class=" border-red-200 border-2 ">Quantità</th>
                            <th class=" border-red-200 border-2 ">data</th>
                            <th class=" border-red-200 border-2 ">opzione</th>
                        </tr>
                    </thead>
                    <tbody class="w-full col  ">
                        <tr class="flex-7 justify-between " v-for="props in article" >
                            <td class=" text-center  border-red-200 border-2 ">{{ props.id }} dell'articolo</td> 
                            <td class=" text-center  border-red-200 border-2 ">{{ props.user_id }} + id person</td> 
                            <td class=" text-center  border-red-200 border-2">{{ props.Title }}</td>
                            <td class=" text-center  border-red-200 border-2">{{ props.Subtitle }}</td>
                            <td class=" text-center  border-red-200 border-2">{{ props.Mony }}</td>
                            <td class=" text-center  border-red-200 border-2">{{ props.Amount }}</td>
                            <td class=" text-center  border-red-200 border-2 ">data</td>
                            <td class=" text-center  border-red-200 border-2">
                                <div  >
                                    <button type="button" class="mx-3 bg-yellow-300 "  @click="update">edit</button>
                                </div>
                                <div  >
                                    <button type="button"  class="mx-3 bg-red-300 " @click="destroy" >Elimina</button>

                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>