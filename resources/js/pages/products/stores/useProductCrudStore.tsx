import { create } from "zustand";
import { Inertia } from "@inertiajs/inertia";
import Swal from "sweetalert2";
import { useForm } from "@inertiajs/react";

interface Product {
  id?: string;
  name: string;
  price: string;
  sku: string;
  slug: string;
  description: string;
  is_activate: string;
}

interface ProductCrudStore {
    records: Product[];
    selectedProduct: Product | null;
    setRecords: (products: Product[]) => void;
    filter: {
        search: string;
        name: string;
        price: string;
        sku: string;
        slug: string;
        description: string;
        is_activate: string;
    };
    setSelectedProduct: (product: Product) => void;
    resetSelectedProduct: () => void;
    handleSubmit: (data: Product) => void;
    clearFilter: () => void;
    filterform: any;
    initFilterForm: (form:any)=>void,
    initTest: ()=>void,
}

const useProductCrudStore = create<ProductCrudStore>((set) => ({
  records: [],
  selectedProduct: null,
  filterform : {},
  initFilterForm : (form)=> set({filterform:form})
,
  initTest:()=>{
console.log('test');

  },
  setRecords: (products) => set({ records: products }),
    filter: {
    search: "",
    name: "",
    price: "",
    sku: "",
    slug: "",
    description: "",
    is_activate: "",
  },
    setSelectedProduct: (product) => set({ selectedProduct: product }),
    resetSelectedProduct: () => set({ selectedProduct: null }),
    useFormData: () => {
    const { data, setData } = useForm({
      id: "",
      name: "",
      price: "",
      sku: "",
      slug: "",
      description: "",
      is_activate: false,
    });

    set({ data, setData });
    return { data, setData };
  },

  handleSubmit: async (data) => {

    try {
      console.log('Checking data.id', data.id);
      if (data.id) {
        await Inertia.put(route("products.update", data.id), data); 
    } else {
        await Inertia.post(route("products.store"), data); 
      }

      Swal.fire({
        title: "Success!",
        text: data.id ? "Product updated successfully." : "Product created successfully.",
        icon: "success",
        confirmButtonText: "OK",
      });
    } catch (error) {
      Swal.fire({
        title: "Error",
        text: "Something went wrong, please try again.",
        icon: "error",
        confirmButtonText: "OK",
      });
    }
  },
  clearFilter: () =>
    set({
      filter: {
        search: "",
        name: "",
        price: "",
        sku: "",
        slug: "",
        description: "",
        is_activate: "",
      },
    }),
}));

export default useProductCrudStore;
