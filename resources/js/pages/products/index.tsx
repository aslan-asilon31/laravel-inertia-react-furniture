import React, { useEffect, useState } from "react";
import { Button } from "@/components/ui/button";
import AppLayout from "@/layouts/app-layout";
import { Head, usePage } from "@inertiajs/react";
import ProductTable from "@/pages/products/components/product-table";
import { Card, CardHeader, CardTitle, CardContent } from "@/components/ui/card";

const ProductIndex = () => {
  const { products: records } = usePage().props;


  const [isSheetOpen, setIsSheetOpen] = useState(false);
  const toggleSheet = () => setIsSheetOpen((prevState) => !prevState);

  return (
    <AppLayout>
      <Head title="Products" />
      <div className="flex flex-col gap-4 rounded-xl p-4 overflow-x-auto">
        <Card>
          <CardHeader>
            <CardTitle>Product Page</CardTitle>
          </CardHeader>
        </Card>

        <Card>
          <CardContent>
            {records && records.length > 0 ? (
              <ProductTable  />
            ) : (
              <div>No products available</div>
            )}
          </CardContent>
        </Card>
      </div>
    </AppLayout>
  );
};

export default ProductIndex;
