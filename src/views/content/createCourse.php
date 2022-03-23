<script
          src="https://cdn.tiny.cloud/1/qft0y7nd2fkpbh6iu02sd4mi8drr27xu3vdx2zvpjl2tjbxj/tinymce/5/tinymce.min.js"
          referrerpolicy="origin"
        ></script>
        <link rel="stylesheet" href="<?php echo $link_sever ?>/public/css/create_course.css" />
        <div class="sales-boxes">
          <div class="recent-sales box" style="width: 100%; display: block">
            <div class="title">Tạo khóa học mới</div>

            <form
              class="new-couse"
              method="post"
              action="./processing/course_add.php"
              enctype="multipart/form-data"
            >
              <label for="">Tên của khóa học</label>
              <input
                name="name_course"
                type="text"
                placeholder="Nhập tên của khóa học"
                onchange="changeTitle(event)"
              />
              <br />
              <label for="">Giá của khóa học</label>
              <input
                name="price"
                type="number"
                placeholder="Nhập giá của khóa học"
                onchange="ChangePrice(event)"
              />
              <br />
              <label for="">Ảnh mô tả</label>
              <input
                name="image_course"
                style="border: none"
                type="file"
                onchange="loadFile(event)"
              />
              <br />
              <textarea name="description" id="myTextarea"></textarea>
              <button id="btn">Tạo khóa học mới</button>
            </form>
          </div>
        </div>

        <div class="sales-boxes" style="margin-top: 25px">
          <div class="recent-sales box" style="width: 100%; display: block">
            <div class="title">Xem trước khóa học mới</div>
            <div class="content">
              <div class="img-pre">
                <img
                  id="img-preview"
                  src="https://image.thanhnien.vn/w1024/Uploaded/2022/xdrkxrvekx/2021_10_12/picture1-3031.png"
                  alt=""
                />
              </div>
              <br />
              <div class="cart-details">
                <h2 id="title-course">Tên khóa học:</h2>
                <p id="number-course">
                  <i class="bx bxs-videos"></i>
                  Số lượng bài học: 10 Bài
                </p>

                <p id="author-course">
                  <i class="bx bxs-user"></i>
                  Tác giả: Bé Công
                </p>

                <p id="price-course">
                  <i class="bx bxs-credit-card"></i>
                  Giá thành: 000 VND
                </p>
              </div>
            </div>
            <br />
            <div class="title">Mô tả khóa học</div>
            <br />
            <div id="description-preview"></div>
          </div>
        </div>
        <script src="<?php echo $link_sever ?>/public/javascript/create_course.js"></script>