import { create } from "zustand";
import { Inertia } from "@inertiajs/inertia";
import Swal from "sweetalert2"; 

interface Product {
  id: string;
  product_category_first_id: string;
  name: string;
  selling_price: number;
  availability: string;
  image_url: string;
  created_by: string;
  updated_by: string;
  is_activated: number;
  created_at: string;
  updated_at: string;
}

interface Pagination {
  current_page: number;
  from: number;
  last_page: number;
  per_page: number;
  prev_page_url: string | null;
  to: number;
  total: number;
}

interface ProductIndexStore {
  records: Product[];
  loading: boolean;
  pagination: Pagination;
  filter: {
    search: string;
    availability: string;
    selling_price: string;
    image_url: string;
    created_by: string;
    updated_by: string;
    is_activated: string;
  };
  setLoading: (loading: boolean) => void;
  handleSubmit: (data: Product) => void;
  setRecords: (products: Product[]) => void;
  clearFilter: () => void;
}

const useProductIndexStore = create<ProductIndexStore>((set) => ({
  records: [], // Initialize with an empty array
  loading: false, // Loading state to show/hide loading indicators
  pagination: {
    current_page: 1,
    from: 1,
    last_page: 1,
    per_page: 10,
    prev_page_url: null,
    to: 10,
    total: 0,
  },
  filter: {
    search: "",
    availability: "",
    selling_price: "",
    image_url: "",
    created_by: "",
    updated_by: "",
    is_activated: "",
  },
  setLoading: (loading) => set({ loading }),
    handleSubmit: async (data) => {
        
    try {
      await Inertia.post(route("products.store"), data);

      Swal.fire({
        title: "Success!",
        text: "Product created successfully.",
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
  setRecords: (products) => set({ records: products }), // To set the records in Zustand store
  clearFilter: () =>
    set({
      filter: {
        search: "",
        availability: "",
        selling_price: "",
        image_url: "",
        created_by: "",
        updated_by: "",
        is_activated: "",
      },
    }),
}));

export default useProductIndexStore;
