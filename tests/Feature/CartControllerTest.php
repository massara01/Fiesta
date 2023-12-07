public function testCreate()
{
    $response = $this->post('/cart/create', [
        'id' => 5,
        'name' => 'product1',
        'qty' => 1,
        'price' => 11,
        'stock' => 50,
        'affiche' => 'photo'
    ]);

    $response->assertRedirect('/');
    $this->assertDatabaseHas('cart', [
        'id' => 1,
        'name' => 'product1',
        'qty' => 1,
        'price' => 11,
        'stock' => 50,
        'affiche' => 'photo'
    ]);
}
