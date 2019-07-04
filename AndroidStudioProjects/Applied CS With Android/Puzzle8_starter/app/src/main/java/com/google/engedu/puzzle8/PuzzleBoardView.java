package com.google.engedu.puzzle8;

import android.app.Activity;
import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.Collection;
import java.util.Collections;
import java.util.Comparator;
import java.util.Random;
import java.util.PriorityQueue;

public class PuzzleBoardView extends View {
    public static final int NUM_SHUFFLE_STEPS = 40;
    private Activity activity;
    private PuzzleBoard puzzleBoard;
    private ArrayList<PuzzleBoard> animation;
    private Random random = new Random();


    private Comparator<PuzzleBoard> puzzleBoardComparator = new Comparator<PuzzleBoard>() {
        @Override
        public int compare(PuzzleBoard lhs, PuzzleBoard rhs) {
            return lhs.priority() - rhs.priority();
        }
    };

    public PuzzleBoardView(Context context) {
        super(context);
        activity = (Activity) context;
        animation = null;
    }

    public void initialize(Bitmap imageBitmap) {
        int width = getWidth();
        puzzleBoard = new PuzzleBoard(imageBitmap, width);
    }

    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);
        if (puzzleBoard != null) {
            if (animation != null && animation.size() > 0) {
                puzzleBoard = animation.remove(0);
                puzzleBoard.draw(canvas);
                if (animation.size() == 0) {
                    animation = null;
                    puzzleBoard.reset();
                    Toast toast = Toast.makeText(activity, "Solved! ", Toast.LENGTH_LONG);
                    toast.show();
                } else {
                    this.postInvalidateDelayed(500);
                }
            } else {
                puzzleBoard.draw(canvas);
            }
        }
    }

    public void shuffle() {
        if (animation == null && puzzleBoard != null) {
            for(int i = 0; i < NUM_SHUFFLE_STEPS; i++) {
                ArrayList<PuzzleBoard> neighbours = puzzleBoard.neighbours();
                puzzleBoard = neighbours.get(random.nextInt(neighbours.size()));
            }
        }
        invalidate();
    }

    @Override
    public boolean onTouchEvent(MotionEvent event) {
        if (animation == null && puzzleBoard != null) {
            switch(event.getAction()) {
                case MotionEvent.ACTION_DOWN:
                    if (puzzleBoard.click(event.getX(), event.getY())) {
                        invalidate();
                        if (puzzleBoard.resolved()) {
                            Toast.makeText(activity, "Congratulations!", Toast.LENGTH_LONG).show();
                        }
                        return true;
                    }
            }
        }
        return super.onTouchEvent(event);
    }

    public void solve() {
        PriorityQueue<PuzzleBoard> queue = new PriorityQueue<>(1, puzzleBoardComparator);
        /*PuzzleBoard current = new PuzzleBoard(puzzleBoard);
        queue.add(current);*/
        queue.add(puzzleBoard);
        while (!queue.isEmpty()) {
            Log.d("outside if","yes");
            PuzzleBoard removedBoard = queue.poll();
            if (!removedBoard.resolved()) {
                for (int i = 0; i < removedBoard.neighbours().size(); i++) {
                    queue.add(removedBoard.neighbours().get(i));
                    Log.d("neighbour",i + "");
                }
            } else {
                Log.d("finalay found solution","yes");
                ArrayList<PuzzleBoard> puzzleBoardSolutions = new ArrayList<>();
                while (removedBoard.getPreviousBoard() != null) {
                    puzzleBoardSolutions.add(removedBoard);
                    removedBoard = removedBoard.getPreviousBoard();
                }
                Collections.reverse(puzzleBoardSolutions);
                animation = puzzleBoardSolutions;
                invalidate();
                break;
            }
        }
    }
}
