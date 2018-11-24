package decoration;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Rect;
import android.graphics.RectF;
import android.graphics.drawable.GradientDrawable;
import android.support.annotation.DimenRes;
import android.support.annotation.NonNull;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;

/**
 * Created by pashvinkumar on 28-05-2018.
 */

public class ItemOffsetDecoration extends RecyclerView.ItemDecoration {

    private int mItemOffset;

    private Paint paint;
    private Context context;
    private int dividerHeight;

    private int layoutOrientation = -1;

    public ItemOffsetDecoration(int itemOffset) {
        mItemOffset = itemOffset;
        paint = new Paint();
        paint.setColor(Color.BLACK);
        paint.setStyle(Paint.Style.STROKE);
        paint.setStrokeWidth(5);

        dividerHeight = 5;
    }

    public ItemOffsetDecoration(@NonNull Context context, @DimenRes int itemOffsetId) {
        this(context.getResources().getDimensionPixelSize(itemOffsetId));
    }

    @Override
    public void getItemOffsets(Rect outRect, View view, RecyclerView parent,
                               RecyclerView.State state) {
        super.getItemOffsets(outRect, view, parent, state);
        outRect.set(mItemOffset, mItemOffset, mItemOffset, mItemOffset);

    }


    //link
    //go to this site for understanding it
    //http://www.zoftino.com/recyclerview-itemdecoration

    @Override
    public void onDraw(Canvas c, RecyclerView parent, RecyclerView.State state) {
        super.onDraw(c, parent, state);
       /* if(parent.getLayoutManager() instanceof LinearLayoutManager && layoutOrientation == -1){
            layoutOrientation = ((LinearLayoutManager) parent.getLayoutManager()).getOrientation();
        }
        if(layoutOrientation == LinearLayoutManager.HORIZONTAL){
            horizontal(c, parent);
        }else{
            vertical(c, parent);
        }*/
    }
   /* private void horizontal(Canvas c, RecyclerView parent){
        final int top = parent.getPaddingTop();
        final int bottom = parent.getHeight() - parent.getPaddingBottom();

        final int itemCount = parent.getChildCount();
        for (int i = 0; i < itemCount; i++) {
            final View child = parent.getChildAt(i);
            final RecyclerView.LayoutParams params = (RecyclerView.LayoutParams) child
                    .getLayoutParams();
            final int left = child.getRight() + params.rightMargin;
            final int right = child.getLeft() + dividerHeight;
            //c.drawRect(left,top,right,bottom, paint);

            c.drawRoundRect(new RectF(left,top,right,bottom), 16, 16, paint);
        }
    }*/
    /*private void vertical(Canvas c, RecyclerView parent){
        final int left = parent.getPaddingLeft();
        final int right = parent.getWidth() - parent.getPaddingRight();

        final int childCount = parent.getChildCount();
        for (int i = 0; i < childCount; i++) {
            final View child = parent.getChildAt(i);
            final RecyclerView.LayoutParams params = (RecyclerView.LayoutParams) child
                    .getLayoutParams();
            final int top = child.getBottom() + params.bottomMargin;
            final int bottom = child.getTop() + dividerHeight;
            c.drawRect(left,top,right,bottom, paint);

        }
    }
*/

}